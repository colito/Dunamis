<?php
require_once('components/ussd_view.php');
require_once('functions/nguni_functions.php');

class view_qualification extends IUssdView
{
    private $profile;
    private $answers;

    public function process_page()
    {
        $this->profile = new ProfileAPIWrapper(new YomoModule(Yomo::getConfigValue('module_profile_path')));
        $this->answers = $this->profile->request_profile(2, $this->process_parameters_array['msisdn']);

        $this->setViewTitle('Qualification');

        if($this->isPostback('enter_id'))
        {
            # Validate ID Number
            $postback_answer = $this->getInputPostback()['captured_inputs'][0];

            # Checks if the string length is correct and if also check if the string contains any alphabets.
            if(strlen($postback_answer['value']) < 13 || ctype_alpha($postback_answer['value']))
            {   # invalid
                $this->unsetInputPostback();
                $this->promt_id_number($this->getCopy('USSD.MSG.INVALID.ID'));
            }
            else
            {
                if(validate_id_number($postback_answer['value']))
                {
                    $this->setViewTitle('Qualification - Thank You');
                    $this->saveProfileAnswer($postback_answer['field'], $postback_answer['value']);
                    $this->addUssdObject(new UssdText($this->getCopy('USSD.PAGE.ID.THANK.YOU')));
                }
                else
                {
                    $this->unsetInputPostback();
                    $this->promt_id_number($this->getCopy('USSD.MSG.INVALID.ID'));
                }
            }
        }
        else
        {
            $this->promt_id_number();
        }

        $this->execute();
    }

    # Asks the user to enter their ID number so that they can be profiled
    private function promt_id_number($override_question_text = null)
    {
        $this->setViewTitle('ID Number');

        if (empty($override_question_text))
        {
            $question_text = $this->answers['profile_questions']['unanswered'][0]['descriptive_label'];
        }
        else
        {
            $question_text = $override_question_text;
        }

        $objInputName = new UssdInput($this, $this->process_parameters_array);
        $objInputName->addInput('enter_id', $question_text, USSD_INPUT_TYPE_FREETEXT);
        $objInputName->setSubmitHandlerComponent('nguni');
        $objInputName->setSubmitHandlerView('view_qualification');
        $objInputName->setInputId('enter_id');

        $this->addUssdObject($objInputName);
    }

    # Saves a newly created profile
    private function saveProfileAnswer($profile_field_name, $question_answer)
    {
        foreach($this->answers['profile_questions']['all'] as $answer)
        {
            if ($answer['field'] == $profile_field_name)
            {
                $answer['value'] = $question_answer;

                $this->profile->request_save_profile(2, $this->process_parameters_array['msisdn'], array($answer), 'USSD', $this->getTrackingSessionId());
                return true;
            }
        }
        return false;
    }
}


?>