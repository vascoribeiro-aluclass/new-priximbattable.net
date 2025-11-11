<?php

class Customer extends CustomerCore {

  public function trackingOrderGoldylocks($orderReference) {
    $saltGoldylocks = "5f25089c1f16a97be39a9687b38fc984c4e119a41800be187266d0040ea050fa";
    $joinedString = sha1($orderReference.$saltGoldylocks);
    return $joinedString;
  }

}

?>
