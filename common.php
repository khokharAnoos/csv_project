<?php
/**
 * Created by PhpStorm.
 * User: kc
 * Date: 11/29/2018
 * Time: 7:50 PM
 */

class Common
{
  public function uploadData($connection,$date,$category,$lot_title, $lot_location, $lot_condition, $pre_tax_amount, $tax_name, $tax_amount)
  {
      $mainQuery = "INSERT INTO `csv_file`(`date`, `category`, `lot_title`, `lot_location`, `lot_condition`, `pre_tax_amount`, `tax_name`, `tax_amount`) VALUES('$date', '$category', '$lot_title', '$lot_location', '$lot_condition', '$pre_tax_amount', '$tax_name', '$tax_amount')";
      $result1 = $connection->query($mainQuery) or die("Error in main Query".$connection->error);
      return $result1;
  }
}
?>