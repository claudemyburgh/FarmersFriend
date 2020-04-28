<?php


namespace App\RouteMethods;


class LegalRoutes
{

    /**
     * @return \Closure
     */
    public function legal()
    {
        return function() {
            $this->get('privacy-policy', 'Legal\PrivacyPolicyController@index')->name('privacy-policy');
            $this->get('terms-conditions', 'Legal\TermsConditionsController@index')->name('terms-conditions');

        };
    }


}
