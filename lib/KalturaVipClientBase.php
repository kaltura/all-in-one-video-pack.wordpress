<?php
/**
 * Created by PhpStorm.
 * User: mikebrik
 * Date: 22/7/14
 * Time:    17:30
 */

class KalturaVipClientBase extends Kaltura_Client_Client {


    /**
     * Send http request by using curl (if available) or php stream_context
     *
     * @param string     $url
     * @param parameters $params
     *
     * @return array of result and error
     */
    protected function doHttpRequest( $url, $params = array(), $files = array() ) {
        if ( count( $files ) > 0 ) {
            throw new Kaltura_Client_ClientException( 'Uploading files is not supported with stream context http request, please use curl', Kaltura_Client_ClientException::ERROR_UPLOAD_NOT_SUPPORTED );
        }

        $requestParams = array(
            'method' => 'POST',
            'timeout' => $this->config->curlTimeout,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'user-agent' => $this->config->userAgent,
            'headers' => array("Accept-language: en" ,	"Content-type: application/x-www-form-urlencoded"),
            'body' => $params,
            'cookies' => array()
        );

        $response = wp_remote_post( $url, $requestParams);

        if ( is_wp_error( $response ) ) {
            $error_message = $response->get_error_message();
            throw new Kaltura_Client_ClientException( "Problem connecting to $url. Error msg: $error_message", Kaltura_Client_ClientException::ERROR_GENERIC );
        } else {
            return array( wp_remote_retrieve_body($response) , 200, '' );;
        }

    }//doHttpRequest


}