<?php

namespace Php;

class SplPhpObject extends \SplFileObject implements \JsonSerializable
{
 private array $I = [];
 private array $L = [];
 private array $N = [];

 public function A(int $F = JSON_NUMERIC_CHECK | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES | JSON_BIGINT_AS_STRING | JSON_FORCE_OBJECT | JSON_PRETTY_PRINT, $D = 1024): Object
 {
  return (object)json_encode($this, $F, $D);
 }

 private function C(): String
 {
  return '<?php ' . join('', $this->L()) . ' ?>';
 }

 public function jsonSerialize(): mixed
 {
  return [
   'I' => $this->I,
   'L' => $this->L,
   'N' => $this->N
  ];
 }

 private function L(): array
 {
  $L = [];
  do {
   array_push($L, mb_ereg_replace("\r", ' ', rtrim(ltrim($this->fgets()), '')));
  } while (!$this->eof());
  return $L;
 }

 private function P(): void
 {
  foreach ($this->T() as $Token) {
   $I = $Token->id;
   $L = $Token->line - 1;
   $N = token_name($I);
   $P = intval($Token->pos);
   $T = trim($Token->text);
   if (!empty($T)) {
    if (!isset($this->N[$N])) {
     $this->N[$N] = [];
    }
    if (mb_ereg_replace('[^\$\_a-zA-Z0-9]', '', $T, null) == $T) {
     if (isset($this->L[$L]) == false) {
      $this->L[$L] = [];
     }
     array_push($this->N[$N], $T);
     $C = count($this->N[$N]);
     array_push($this->I, strip_tags($L . '/' . $P . '/' . $N . '[' . $C . ']/@' . $I . '=' . $T));
     array_push($this->L[$L], $T);
    } else {
     if (isset($this->N[$N][$T])) {
      $this->N[$N][$T] += 1;
     } else {
      $this->N[$N][$T] = 0;
     }
    }
   }
  }
 }

 private function T(): array
 {
  return \PhpToken::tokenize($this->C());
 }

 public function __construct(string $F, $M = 'r', bool $U = false, $C = null)
 {
  parent::__construct($F, $M, $U, $C);
  $this->P();
 }
}
