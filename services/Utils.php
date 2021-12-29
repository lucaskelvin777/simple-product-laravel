<?php

namespace Services;

use Illuminate\Http\Request;

class Utils
{
    public static function getBytesFromHexString($hexdata)
    {
        for ($count = 0; $count < strlen($hexdata); $count += 2)
            $bytes[] = chr(hexdec(substr($hexdata, $count, 2)));

        return implode($bytes);
    }
    // Função que comprime a imagem, de acordo com o informado nos parametros
    public static function compressImage(string $source_url, string $destination_url, int $quality)
    {
        $info = getimagesize($source_url);
        if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
        elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
        elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
        imagejpeg($image, $destination_url, $quality);
        return true;
    }
    public static function getImageMimeType(string $imagedata)
    {
        $imagemimetypes = array(
            "jpeg" => "FFD8",
            "png" => "89504E470D0A1A0A",
            "gif" => "474946",
            "bmp" => "424D",
            "tiff" => "4949",
            "tiff" => "4D4D"
        );

        foreach ($imagemimetypes as $mime => $hexbytes) {
            $bytes = self::getBytesFromHexString($hexbytes);
            if (substr($imagedata, 0, strlen($bytes)) == $bytes)
                return $mime;
        }

        return NULL;
    }
    // Função para recortar a imagem.
    public static function cropImage(Request $request, array $input)
    {
        // Caminho para salvar as imagens
        $path = self::getPathImageProducts();
        // Declaração da variável nome da imagem.
        $nameImage = null;
        if ($request->hasFile('image')) {
            if (empty($input['w']) || empty($input['h']))
                return back()->withErrors(['image' => 'É necessario redimensionar a image para enviá-la']);
            // Caso não exista o caminho, deve cria-lo.
            if (!is_dir($path))
                mkdir($path, 0777, true);
            // Extensão da imagem original.
            $extension = $request->file('image')->getClientOriginalExtension();
            // Nome da imagem.
            $nameImage = time() . '.' . $extension;
            // Comprimir a imagem, para ficar menos pesada para o servidor.
            if ($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png')
                self::compressImage($_FILES["image"]['tmp_name'], $path . '/' . $nameImage, 90);
        }
        $file = $path . DIRECTORY_SEPARATOR . $nameImage;
        if (is_file($file)) {
            // Utiliza a classe M2BRImagem para recortar a imagem previamente salva.
            $oImg = new M2BRImagem($file);
            if ($oImg->valida() == 'OK') {
                $x  = filter_var($input['x'], FILTER_SANITIZE_STRING);
                $y  = filter_var($input['y'], FILTER_SANITIZE_STRING);
                $w  = filter_var($input['w'], FILTER_SANITIZE_STRING);
                $h  = filter_var($input['h'], FILTER_SANITIZE_STRING);
                $oImg->positionCrop($x, $y);
                $oImg->rescale($w, $h, 'crop');
                $oImg->store($file);
            }
        }
        return $nameImage;
    }
    // Deleta o arquivo solicitado
    public static function deleteFile(string $path, string $fileName)
    {
        try {
            if (is_file($path . DIRECTORY_SEPARATOR . $fileName))
                unlink($path . DIRECTORY_SEPARATOR . $fileName);
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }
    public static function getPathImageProducts()
    {
        $directory_separator = DIRECTORY_SEPARATOR;
        return __DIR__ . "{$directory_separator}..{$directory_separator}public{$directory_separator}img{$directory_separator}products";
    }
}
