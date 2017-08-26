<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class SampleSMSTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $serverHEader = [
            'username' => "plivo1",
            'auth_id' => "20S0KPNOIM"
        ];

        $data = [
            'from' => '4924195509012',
            'to' => '4924195509193',
            'text' => "Hi!"
        ];

        /*$this->post('/inbound/sms' , $data, $serverHEader)
            ->seeJsonEquals(['error' => '' , 'message' => 'inbound sms ok']);*/

        $this->post('/outbound/sms' , $data, $serverHEader)
            ->seeJsonEquals(['error' => '' , 'message' => 'from count ' . Cache::get('from_requests_count_' . $data['from'])]);

    }
}
