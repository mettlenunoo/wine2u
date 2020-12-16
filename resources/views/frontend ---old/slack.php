<?php

function slack($message, $channel)
        {
            $ch = curl_init("https://slack.com/api/chat.postMessage");
            $data = http_build_query([
                "token" => "xoxp-397466375269-397194186131-404925035027-6ef57b93a62f8f85bad454ff738080ff",
                "channel" => $channel, //"#mychannel",
                "text" => $message, //"Hello, Foo-Bar channel message.",
                "username" => "Coupon Notifier",
            ]);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);
            
            return $result;
        }
        
        slack("This is a personal message from Me. I can send you notifications when your coupon is used :smile:", "UBP5Q5G3V");
?>