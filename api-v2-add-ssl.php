<?php
require __DIR__ . '/vendor/autoload.php';

use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use GuzzleHttp\Client;

// See https://docs.acquia.com/acquia-cloud/develop/api/auth/
// for how to generate a client ID and Secret.
$clientId = '<to do>';
$clientSecret = '<to do>';

// See https://docs.acquia.com/acquia-cloud/develop/api/auth/
// for how to generate a client ID and Secret.

$provider = new GenericProvider([
    'clientId'                => $clientId,
    'clientSecret'            => $clientSecret,
    'urlAuthorize'            => '',
    'urlAccessToken'          => 'https://accounts.acquia.com/api/auth/oauth/token',
    'urlResourceOwnerDetails' => '',
]);

$client = new Client();
$provider->setHttpClient($client);

echo 'Retrieving access token', PHP_EOL;
$accessToken = $provider->getAccessToken('client_credentials');
echo 'Access token retrieved', PHP_EOL;

// rs prod 52373-b9df03ab-5124-41fe-827f-cd80c1377da6
// rs test 52375-b9df03ab-5124-41fe-827f-cd80c1377da6
// rs dev  52374-b9df03ab-5124-41fe-827f-cd80c1377da6

$totalSSLCerts = 0;
$i = 91;

if($totalSSLCerts) {

echo '===================================================', PHP_EOL;
echo 'Bulk installing SSL certificates over Cloud API V2.', PHP_EOL;
echo '===================================================', PHP_EOL, PHP_EOL;
do {

$label = 'Bulk new SSL '.$i;

// Install SSL certificate request
$request = $provider->getAuthenticatedRequest(
    "POST",
    "https://cloud.acquia.com/api/environments/<to do>/ssl/certificates",
    $accessToken,
    [
        'headers' => ['Content-Type' => 'application/json'],
        'body' => json_encode(['legacy' => false, 'certificate' => "-----BEGIN CERTIFICATE-----
MIIErjCCA5agAwIBAgIUaYWxULPNfdPQ6975T3PiSET5xgAwDQYJKoZIhvcNAQEL
BQAwgYsxCzAJBgNVBAYTAlVTMRkwFwYDVQQKExBDbG91ZEZsYXJlLCBJbmMuMTQw
MgYDVQQLEytDbG91ZEZsYXJlIE9yaWdpbiBTU0wgQ2VydGlmaWNhdGUgQXV0aG9y
aXR5MRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRMwEQYDVQQIEwpDYWxpZm9ybmlh
MB4XDTIwMDIyNzExMDYwMFoXDTM1MDIyMzExMDYwMFowYjEZMBcGA1UEChMQQ2xv
dWRGbGFyZSwgSW5jLjEdMBsGA1UECxMUQ2xvdWRGbGFyZSBPcmlnaW4gQ0ExJjAk
BgNVBAMTHUNsb3VkRmxhcmUgT3JpZ2luIENlcnRpZmljYXRlMIIBIjANBgkqhkiG
9w0BAQEFAAOCAQ8AMIIBCgKCAQEA8xRQRUxVrifFdDLc8Qaz5m6ZboktUbC3iJKB
XVVj0CtpTOYrcRFxw8Lmlm3X1v5IVVX4sfAjNT8fzynIPAYBkqsZVr2CGy8z/ado
N6ts4Xtakzk69X4JpKQ+LrpttaF2bgri724pZnvqWcUAbHyoDQ5UoSYhxaKjZkcT
VfDKFz/qQlOW1yGMpd7fCNfixjiufmMiNDU5v2Sp+Rp4NM9S+e8LEcMftqeUuYqG
+VKwPdihPl7MVrCEs2LPMWAVq7yVKHYq4bDO7Mab6h6UiDLY48+N5+hCAoqyWjWt
r4J7gVMpbamQauK1Uauqdkrm73eMOshFXySFMzI9raiFV+0fxwIDAQABo4IBMDCC
ASwwDgYDVR0PAQH/BAQDAgWgMB0GA1UdJQQWMBQGCCsGAQUFBwMCBggrBgEFBQcD
ATAMBgNVHRMBAf8EAjAAMB0GA1UdDgQWBBTm0gm144Nrzl589WS1o4AnhR4oATAf
BgNVHSMEGDAWgBQk6FNXXXw0QIep65TbuuEWePwppDBABggrBgEFBQcBAQQ0MDIw
MAYIKwYBBQUHMAGGJGh0dHA6Ly9vY3NwLmNsb3VkZmxhcmUuY29tL29yaWdpbl9j
YTAxBgNVHREEKjAoghMqLm1vdW50YWluZ2VvcmdlLnVrghFtb3VudGFpbmdlb3Jn
ZS51azA4BgNVHR8EMTAvMC2gK6AphidodHRwOi8vY3JsLmNsb3VkZmxhcmUuY29t
L29yaWdpbl9jYS5jcmwwDQYJKoZIhvcNAQELBQADggEBAI9rgCpv3poi3B8d3f55
tb7MUxpx7n6f+a9Bakc2OZzuiLQgPITvPwwjiPrHyf4j9sJyQFmWy0XzRH1ntY3Q
qJNQIJnZAFujWSIZszOh2OJTAWQTQu/0eqe9Lypb1YMtk6yMU3qiSx7CmgUSyOfc
LwKkYtPCziVxwYA3KgrO5MxSSDuN7KoQpOqBqjPOqzmldKJImWRqfH37AuK9CrRT
nkVBnNptujYspf/GthJSadt3f993xtjPd8hEs+lTzsJ2W+KUO9nWFXCKDq00a/g9
hmYXqn7jpIqetPLXes2kPV9UDQyqV4ST0pjOrnQZUKeiYgKxqoIo/QNp59uZQ9cP
avA=
-----END CERTIFICATE-----",
'private_key' => "-----BEGIN PRIVATE KEY-----
MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQDzFFBFTFWuJ8V0
MtzxBrPmbpluiS1RsLeIkoFdVWPQK2lM5itxEXHDwuaWbdfW/khVVfix8CM1Px/P
Kcg8BgGSqxlWvYIbLzP9p2g3q2zhe1qTOTr1fgmkpD4uum21oXZuCuLvbilme+pZ
xQBsfKgNDlShJiHFoqNmRxNV8MoXP+pCU5bXIYyl3t8I1+LGOK5+YyI0NTm/ZKn5
Gng0z1L57wsRwx+2p5S5iob5UrA92KE+XsxWsISzYs8xYBWrvJUodirhsM7sxpvq
HpSIMtjjz43n6EICirJaNa2vgnuBUyltqZBq4rVRq6p2Subvd4w6yEVfJIUzMj2t
qIVX7R/HAgMBAAECggEAY7CRiRIY039JGfIgLZM3pYn3T99fYDDO3GplNp9l+4JK
Qbjl2Q2z7/qXMdtjmS8ZADJtd6BJ+DTmuUHj9kXqUDnufuXinX563ozRD3+0/DZo
O5fNh8/EaarYO7bGdqZ82P2K+3Hc9cRdJKrIFTX8f7pAWAS49gJQ7Am7MtQ5NVX6
/mWr6+XV1getWBeK09I5+tDbxMlOXNDLr5I+yjw68jNQW5XdwRgrtLutfxT31ar3
zlWGGHYT70aBjJ+Geo6GOMGrvyihL44z2STzgT02mUd0zqtPn0odiVGIfPjxKQv0
Bl/2k0Yc6zM2sgUQns3r4mNtdgc2Evz2KCsT1D/YcQKBgQD8nRNzH6+z91uJDd+Z
J+JFOl6bxMVOZYjyWlzNHiSIrJHTDZS1bSokBfuAvvu0c3SV/K1OdUw7WQ0FwjNS
V9R2cjPOqckergR0vMFT2mfgk/iDcJiP6nOzQ2zlxVJizZ+h/UASkgQY6ttvB3j4
TTnYH1K4ix9D2UW1tADNlprLNwKBgQD2VoSREG52gdZas7iyW62u4GQSQaa5F8Fg
b+KC2z4MwbSwNGSns+LmMbbiC72UYTJ6Suoz0kFet9lgf929im0RWdPtFfqv244V
GwWIlqj5HeWQskcPC23jGyfNFi7gRePWbw4PS+g0ipY/LvMhEEFwsEKxxmEoeIpu
H7uOyU038QKBgQCzZaHAakpPVmVtKasXi1mHrHIv0UgF6tmcs0ugZ72uSk+tQMHR
Llt1BcKcpgT/G9c6BR3W0Dp5Ez7KTiZAXhuGmofsRmuMHC0R8lKhiEOpG6yrO7U8
z1Wng0S80Ks3e6vYUI/GIGhEgdWgPgBM5hskPupyIGrttklpRxIi7sezdQKBgQCA
GjPsQFBBfnmbR3TYA8cJdxVzTQLHpGvim6x+gkb9WUp+i3CAqZJoRRgm6xYWcIlQ
gV7TvhZSjGcVwMjuRWs8p6sG0vQ/uXxky12QT1Dl4787BQrg7v+hJ8EF7PBJnu7B
15THLaE+mYdSqjazTgHJ+U9lpZVm93B9njDqKxLl8QKBgQDI+BNMk1Ok68sn2RKh
U9W3D0gjN6jrDPM6llabKkGXINhn/yhiCe4F6HWBREMXU0EwjVZt2BhpYahSYPfB
Ph0X5dhDozcZTTuxTzwrZF9qp1oiRcXVSys6h4+/Ea6SPC9eRQzlkblfD6HDOxf6
qsiZkjWuLfmoFXj85guiw3N+Gg==
-----END PRIVATE KEY-----",
'ca_certificates' => "-----BEGIN CERTIFICATE-----
MIIEADCCAuigAwIBAgIID+rOSdTGfGcwDQYJKoZIhvcNAQELBQAwgYsxCzAJBgNV
BAYTAlVTMRkwFwYDVQQKExBDbG91ZEZsYXJlLCBJbmMuMTQwMgYDVQQLEytDbG91
ZEZsYXJlIE9yaWdpbiBTU0wgQ2VydGlmaWNhdGUgQXV0aG9yaXR5MRYwFAYDVQQH
Ew1TYW4gRnJhbmNpc2NvMRMwEQYDVQQIEwpDYWxpZm9ybmlhMB4XDTE5MDgyMzIx
MDgwMFoXDTI5MDgxNTE3MDAwMFowgYsxCzAJBgNVBAYTAlVTMRkwFwYDVQQKExBD
bG91ZEZsYXJlLCBJbmMuMTQwMgYDVQQLEytDbG91ZEZsYXJlIE9yaWdpbiBTU0wg
Q2VydGlmaWNhdGUgQXV0aG9yaXR5MRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRMw
EQYDVQQIEwpDYWxpZm9ybmlhMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKC
AQEAwEiVZ/UoQpHmFsHvk5isBxRehukP8DG9JhFev3WZtG76WoTthvLJFRKFCHXm
V6Z5/66Z4S09mgsUuFwvJzMnE6Ej6yIsYNCb9r9QORa8BdhrkNn6kdTly3mdnykb
OomnwbUfLlExVgNdlP0XoRoeMwbQ4598foiHblO2B/LKuNfJzAMfS7oZe34b+vLB
yrP/1bgCSLdc1AxQc1AC0EsQQhgcyTJNgnG4va1c7ogPlwKyhbDyZ4e59N5lbYPJ
SmXI/cAe3jXj1FBLJZkwnoDKe0v13xeF+nF32smSH0qB7aJX2tBMW4TWtFPmzs5I
lwrFSySWAdwYdgxw180yKU0dvwIDAQABo2YwZDAOBgNVHQ8BAf8EBAMCAQYwEgYD
VR0TAQH/BAgwBgEB/wIBAjAdBgNVHQ4EFgQUJOhTV118NECHqeuU27rhFnj8KaQw
HwYDVR0jBBgwFoAUJOhTV118NECHqeuU27rhFnj8KaQwDQYJKoZIhvcNAQELBQAD
ggEBAHwOf9Ur1l0Ar5vFE6PNrZWrDfQIMyEfdgSKofCdTckbqXNTiXdgbHs+TWoQ
wAB0pfJDAHJDXOTCWRyTeXOseeOi5Btj5CnEuw3P0oXqdqevM1/+uWp0CM35zgZ8
VD4aITxity0djzE6Qnx3Syzz+ZkoBgTnNum7d9A66/V636x4vTeqbZFBr9erJzgz
hhurjcoacvRNhnjtDRM0dPeiCJ50CP3wEYuvUzDHUaowOsnLCjQIkWbR7Ni6KEIk
MOz2U0OBSif3FTkhCgZWQKOOLo1P42jHC3ssUZAtVNXrCk3fw9/E15k8NPkBazZ6
0iykLhH1trywrKRMVw67F44IE8Y=
-----END CERTIFICATE-----",
//'csr_id' => 21838,
'label' => $label
        ])
    ]
);

// Send the request.
echo "Installing SSL cert '" . $label . "'", PHP_EOL;
$response = $client->send($request);

// if we didn't get a success...
if($response->getStatusCode() != 202) {
    echo 'Request failed', PHP_EOL;
} else {

    $responseBody = json_decode($response->getBody()->getContents(), true);
    $notificationLink = $responseBody['_links']['notification']['href'];

    $retryCount = 1000;

    echo 'Start watching for notification status at ', $notificationLink, PHP_EOL;
    do {
        sleep(5);
        // create notification request.
        $request = $provider->getAuthenticatedRequest(
            'GET',
            $notificationLink,
            $accessToken
        );

        echo 'Requesting notification status', PHP_EOL;
        $response = $client->send($request);
        $responseBody = json_decode($response->getBody()->getContents(), true);
        echo 'Notification status: ', $responseBody['status'], PHP_EOL;

        if ($responseBody['status'] === 'completed') {
            echo "\033[32mSuccessfully installed SSL certificate.\033[0m", PHP_EOL, PHP_EOL;
            $retry = false;
        } elseif ($responseBody['status'] === 'failed') {
            echo "\033[31m\Failed to install SSL certificate.\033[0m", PHP_EOL, PHP_EOL;
            $retry = false;
        } else {
            echo 'Retrying notification in 5 sec', PHP_EOL;
            $retryCount--;
            $retry = $retryCount > 0;
        }
    } while ($retry);
}

$totalSSLCerts--;
$i++;
$moreToInstall = $totalSSLCerts > 0;

} while ($moreToInstall);


}

echo '==============================================', PHP_EOL;
echo 'Activating SSL certificates over Cloud API V2.', PHP_EOL;
echo '==============================================', PHP_EOL, PHP_EOL;

// Look up available SSL certificates
$request = $provider->getAuthenticatedRequest(
    'GET',
    "https://cloud.acquia.com/api/environments/<to do>/ssl/certificates",
    $accessToken
);

// Send the request.
echo 'Getting installed SSL certs', PHP_EOL;
$response = $client->send($request);

echo 'Processing response....', PHP_EOL, PHP_EOL;
$responseBody = json_decode($response->getBody()->getContents(), true);

print_r($responseBody);

// Loop through the certs
foreach ($responseBody["_embedded"]["items"] as $item => $sslcert) {

    // Activate each SSL cert
    echo 'Found cert: '.$sslcert["id"] . ' ' . $sslcert["label"] ,PHP_EOL;

    if($sslcert["flags"]["legacy"]) {
        echo 'Skipping legacy cert ' .$sslcert["id"] ,PHP_EOL ,PHP_EOL;
    }
    else if ($sslcert["flags"]["active"]) {
        echo "Skipping already active cert '".$sslcert["label"]."'" ,PHP_EOL ,PHP_EOL;
    }
    else {
        $request = $provider->getAuthenticatedRequest(
            'POST',
            "https://cloud.acquia.com/api/environments/<to do>/ssl/certificates/".$sslcert["id"]."/actions/activate",
            $accessToken
        );

        // Send the request.
        echo "\033[32mActivating SSL cert '" . $sslcert["label"] . "' \033[0m", PHP_EOL, PHP_EOL;
        $response = $client->send($request);
    }

}

