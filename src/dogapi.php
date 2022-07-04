<?php
/**
 * Dog API client
 *
 * @author  XXIV
 * @license Apache 2.0
 */

namespace XXIV\DogAPI;

class DogAPIException extends \Exception {}

function _getRequest($endpoint) {
  $response = @file_get_contents("https://dog.ceo/api/$endpoint");
  if ($response === false) {
    throw new \Exception($http_response_header[0]);
  }
  return $response;
}

/**
* DISPLAY SINGLE RANDOM IMAGE FROM ALL DOGS COLLECTION
*
* @return random dog image
* @throws DogAPIException if something went wrong
*/
function randomImage() {
  try {
    $response = _getRequest("breeds/image/random");
    $data = json_decode($response, true);
    if ($data["status"] !== "success") {
      throw new \Exception($data["message"]);
    }
    return $data["message"];
  } catch(\Exception $err) {
    throw new DogAPIException($err->getMessage());
  }
}

/**
* DISPLAY MULTIPLE RANDOM IMAGES FROM ALL DOGS COLLECTION
*
* @param imagesNumber number of images
* @return multiple random dog image `NOTE` ~ Max number returned is 50
* @throws DogAPIException if something went wrong
*/
function multipleRandomImages($imagesNumber) {
  try {
    $response = _getRequest("breeds/image/random/$imagesNumber");
    $data = json_decode($response, true);
    if ($data["status"] !== "success") {
      throw new \Exception($data["message"]);
    }
    return $data["message"];
  } catch(\Exception $err) {
    throw new DogAPIException($err->getMessage());
  }
}

/**
* RANDOM IMAGE FROM A BREED COLLECTION
*
* @param breed breed name
* @return random dog image from a breed, e.g. hound
* @throws DogAPIException if something went wrong
*/
function randomImageByBreed($breed) {
  try {
    $response = _getRequest("breed/".trim($breed)."/images/random");
    $data = json_decode($response, true);
    if ($data["status"] !== "success") {
      throw new \Exception($data["message"]);
    }
    return $data["message"];
  } catch(\Exception $err) {
    throw new DogAPIException($err->getMessage());
  }
}

/**
 * MULTIPLE IMAGES FROM A BREED COLLECTION
 *
 * @param breed breed name
 * @param imagesNumber number of images
 * @return multiple random dog image from a breed, e.g. hound
 * @throws DogAPIException if something went wrong
 */
function multipleRandomImagesByBreed($breed,$imagesNumber) {
  try {
    $response = _getRequest("breed/".trim($breed)."/images/random/$imagesNumber");
    $data = json_decode($response, true);
    if ($data["status"] !== "success") {
      throw new \Exception($data["message"]);
    }
    return $data["message"];
  } catch(\Exception $err) {
    throw new DogAPIException($err->getMessage());
  }
}

/**
 * ALL IMAGES FROM A BREED COLLECTION
 *
 * @param breed breed name
 * @return list all the images from a breed, e.g. hound
 * @throws DogAPIException if something went wrong
 */
function imagesByBreed($breed) {
  try {
    $response = _getRequest("breed/".trim($breed)."/images");
    $data = json_decode($response, true);
    if ($data["status"] !== "success") {
      throw new \Exception($data["message"]);
    }
    return $data["message"];
  } catch(\Exception $err) {
    throw new DogAPIException($err->getMessage());
  }
}

/**
 * SINGLE RANDOM IMAGE FROM A SUB BREED COLLECTION
 *
 * @param breed breed name
 * @param subBreed sub_breed name
 * @return random dog image from a sub-breed, e.g. Afghan Hound
 * @throws DogAPIException if something went wrong
 */
function randomImageBySubBreed($breed,$subBreed) {
  try {
    $response = _getRequest("breed/".trim($breed)."/".trim($subBreed)."/images/random");
    $data = json_decode($response, true);
    if ($data["status"] !== "success") {
      throw new \Exception($data["message"]);
    }
    return $data["message"];
  } catch(\Exception $err) {
    throw new DogAPIException($err->getMessage());
  }
}

/**
 * MULTIPLE IMAGES FROM A SUB-BREED COLLECTION
 *
 * @param breed breed name
 * @param subBreed sub_breed name
 * @param imagesNumber number of images
 * @return multiple random dog images from a sub-breed, e.g. Afghan Hound
 * @throws DogAPIException if something went wrong
 */
function multipleRandomImagesBySubBreed($breed,$subBreed,$imagesNumber) {
  try {
    $response = _getRequest("breed/".trim($breed)."/".trim($subBreed)."/images/random/$imagesNumber");
    $data = json_decode($response, true);
    if ($data["status"] !== "success") {
      throw new \Exception($data["message"]);
    }
    return $data["message"];
  } catch(\Exception $err) {
    throw new DogAPIException($err->getMessage());
  }
}

/**
 * LIST ALL SUB-BREED IMAGES
 *
 * @param breed breed name
 * @param subBreed sub_breed name
 * @return list of all the images from the sub-breed
 * @throws DogAPIException if something went wrong
 */
function imagesBySubBreed($breed,$subBreed) {
  try {
    $response = _getRequest("breed/".trim($breed)."/".trim($subBreed)."/images");
    $data = json_decode($response, true);
    if ($data["status"] !== "success") {
      throw new \Exception($data["message"]);
    }
    return $data["message"];
  } catch(\Exception $err) {
    throw new DogAPIException($err->getMessage());
  }
}

/**
 * LIST ALL BREEDS
 *
 * @return map of all the breeds as keys and sub-breeds as values if it has
 * @throws DogAPIException if something went wrong
 */
function breedsList() {
  try {
    $response = _getRequest("breeds/list/all");
    $data = json_decode($response, true);
    if ($data["status"] !== "success") {
      throw new \Exception($data["message"]);
    }
    return $data["message"];
  } catch(\Exception $err) {
    throw new DogAPIException($err->getMessage());
  }
}

/**
 * LIST ALL SUB-BREEDS
 *
 * @param breed breed name
 * @return list of all the sub-breeds from a breed if it has sub-breeds
 * @throws DogAPIException if something went wrong
 */
function subBreedsList($breed) {
  try {
    $response = _getRequest("breed/".trim($breed)."/list");
    $data = json_decode($response, true);
    if ($data["status"] !== "success") {
      throw new \Exception($data["message"]);
    }
    return $data["message"];
  } catch(\Exception $err) {
    throw new DogAPIException($err->getMessage());
  }
}
?>