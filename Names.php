<?php
/*

*/

namespace Tag;

use ArrayObject;
use SplFixedArray;
use SplObjectStorage;

class Name
{
 private String $I; // Indentifying

 private SplFixedArray $P; // Pairing
 private String $K; // Key
 private String $W; // Word
 private String $V; // Value

 private SplFixedArray $S; // Spacing    From Left (Head), To P., Right (Body); to a breadth lower than crossing from a breadth more to cross above.
 private String $T; // Tag
 private String $N; // Name
 private String $C; // Content
 private SplObjectStorage $ObjectStorage;

 public function __construct()
 {
 }

 public function __destruct()
 {
 }

 public function __get(String $Name): mixed
 {
 }

 public function __set(String $Name, Mixed $Value): void
 {
 }

 /*
  * strip_tags
  * echo strip_tags("Hello <b><i>GeeksforGeeks!</i></b>", "<b>");
  * Hello <b>GeeksforGeeks!</b>
  *
  * string chop($string, $character)
  */
 public function Format(bool $prepend = false, bool $append = false)
 {
 }

 /*
  * https://www.discogs.com/release/219802-Olex-Doubledouble-Esquilax
  * https://music.youtube.com/watch?v=x8f8tbtMW84
  * https://www.newsandmoods.com/
  * Esquilax (lensquex lesquex)
  *
  * $AName, $QualifiedName
  */
 public function Esquilax(String $AN, ArrayObject $QN, Int $TH = 1, String $UX = Null)
 {
  $NS = self::Expand($AN, $TH, $UX);
  $XN = $NS->getIterator();
  $XQ = $QN->getIterator();
  $XN->rewind();
  do {
   list($Tag, $Word) = [$XN->key(), $XN->current()];
   do {
    list($Key, $Name) = [$XQ->key(), $XQ->current()];
    echo "(`{$Tag}`,`{$Word}`) ";
    echo "(`{$Key}`,`{$Name}`)\n";
   } while ($XQ->next() || $XQ->valid());
   $XQ->rewind();
  } while ($XN->next() || $XN->valid());
 }

 public function Reverse(String $A, String $UX = Null)
 {
  $AUX = mb_strlen($A, $UX);
  if ($AUX > 1) {
   $A = mb_str_split($A, 1, $UX);
   if ($A) {
    $A = array_reverse($A);
    return join('', $A);
   }
  }
  return false;
 }

 public static function Factorial(Int $X): Int
 {
  return $X > 1 ? self::Factorial($X - 1) * $X : $X;
 }

 /*
  * https://music.youtube.com/watch?v=9mMhWUM0KHE
  * 
  * $AName, $TagHeight, $UnionAcross
  */
 public function Edify(String $A, Int $TH = 1, String $UX = Null): ArrayObject
 {
  $AUTHXN = mb_str_split($A, $TH, $UX);
  $ANXT = mb_strlen($A, $UX);
  $L = $AUTHXN;
  $NS = [$A => null];
  for ($a = self::Factorial($ANXT), $b = count($NS), $e = $f = 0; $a > $b; $f++) {
   for ($d = $ANXT - 1, $c = 0; $c < $d && $d > $c; $c++, $d--) {
    do {
     $c = rand(0, $ANXT - 1);
     $M = max(range($c, 0), range($c, $ANXT - 1));
     $d = rand($c, $M[rand(0, count($M) - 1)]);
    } while (strcmp($AUTHXN[$d], $AUTHXN[$c]) === 0);
    $L = array_replace($L, [
     $c => $L[$d],
     $d => $L[$c]
    ]);
    $N = join('', $L);
    if ($e++) {
     $L = array_reverse($L);
     $A = join('', $L);
     if (!isset($NS[$N])) {
      $NS[$N] = $b++;
      $e = 0;
      break;
     }
     if (!isset($NS[$A])) {
      $NS[$A] = $b++;
     }
    }
   }
   if ($a == $b || $e > 1) {
    $b = count($NS);
   }
  }
  return new ArrayObject($NS);
 }

 public static function YieldIs(String $A, Int $TH = 1, String $UX = Null): \Generator
 {
  $AUTHXN = mb_str_split($A, $TH, $UX);
  $ANXT = mb_strlen($A, $UX);
  $Count = -1;
  foreach ($AUTHXN as $X => $AN) {
   yield $AN;
  }
  //return $AUTHXN;
 }

 public function Vowels(String $A)
 {
  foreach (self::YieldIs($A, 1) as $Literal) {
   // Return Vowels?
  }
 }

 /*
  * Entropic Diffusion of Charset Ranges,
  * Into and From a Name;
  * Bearing Initialized Titlesets.
  * Which shall be Sprouted from Arrays of Semi-Final Esquilax Chain.
  *
  */
 public function Diffuse(string $A, String $UX = Null, array ...$Range): ArrayObject
 {
  $Limit = false;
  $Ports = [''];
  $Ranges = array_merge(range('a', 'z'), range('A', 'Z'), ...$Range);
  foreach (self::YieldIs($A, 1, $UX) as $Key => $Literal) {
   if (in_array($Literal, $Ranges)) {
    $Ports[Count($Ports) - 1] .= $Literal;
   } else {
    if (is_bool($Limit) == false) {
     $Limit = (strcmp($Limit, $Literal) === 0) ? $Literal : true;
    } else if ($Limit === false) {
     $Limit = $Literal;
    }
    $Ports[] = $Literal;
    $Ports[] = '';
   }
  }
  if (is_bool($Limit) === false) {
   $Ports = ["$Limit" => array_diff($Ports, [$Limit])];
  }
  $Ports = array_map(function ($Element) {
   if (!is_array($Element)) {
    $Element = [$Element];
   }
   foreach ($Element as &$A) {
    if (ctype_upper($A) || ctype_lower($A)) {
     $A = mb_convert_case($A, MB_CASE_TITLE);
    }
   }
   return join('', $Element);
  }, $Ports);
  return new ArrayObject($Ports);
 }

 /*
  * Here we use objects of an array as a comparitor for roots, prefixes, and suffixes.
  *
  */
 public function Sprout()
 {
 }
}
