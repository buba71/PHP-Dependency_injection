<?php

declare(strict_types = 1);

namespace DDELIMA\PHP\DependencyInjection\utils;

use Symfony\Component\Yaml\Yaml;


final class YamlParser
{
  /**
   * @var string
   */
  private string $itemsKeys = '';

  /**
   * @var array
   */
  private array $data = [];
  /**
   * @param string $file
   * 
   * @return void
   */
  public function Parse(string $file): void
  {
    $this->extractDataParameters(Yaml::parseFile($file));
  }

  /**
   * @param array $array
   * Return each yaml parameter key with own value.
   * @return void
   */
  private function extractDataParameters(array $arrayFromYaml): void
  {
    foreach ($arrayFromYaml as $key => $value) {       
      
      if (is_array($value)) {

        $this->itemsKeys .= $key . '.';
        $this->extractDataParameters($value);

      } else {
        $id = $this->itemsKeys . $key;
        $this->data[$id] = $value;
      }      
    }
    $this->itemsKeys = '';   
  }  

  /**
   * @return array
   */
  public function getData(): array
  {
    return $this->data;
  }
}
