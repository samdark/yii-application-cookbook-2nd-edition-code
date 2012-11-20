<?php
class MathCaptchaAction extends CCaptchaAction
{
    protected function generateVerifyCode()
    {
        return mt_rand((int)$this->minLength, (int)$this->maxLength);
    }

    public function renderImage($code)
    {
        parent::renderImage($this->getText($code));
    }

    protected function getText($code)
    {
        $code = (int)$code;
        $rand = mt_rand(1, $code-1);
        $op = mt_rand(0, 1);
        if($op)
            return $code-$rand."+".$rand;
        else
            return $code+$rand."-".$rand;
    }
}
