<?php

define('AWS_S3_BUCKET', 'seven-gardens-s3');
define('AWS_S3_REGION', 'us-east-1');

function base_url($path = '') {
    return 'http://44.204.8.245/' . $path; // Ajuste para refletir a URL base correta
}
function s3_image_url($imagePath, $useCloudFront = false)
{
    // Remove barra inicial se existir
    $imagePath = ltrim($imagePath, '/');
        
    // URL padrão do S3
    $region = AWS_S3_REGION;
    $bucket = AWS_S3_BUCKET;
    
    return "https://{$bucket}.s3.{$region}.amazonaws.com/{$imagePath}";
}
