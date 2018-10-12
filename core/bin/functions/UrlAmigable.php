<?php
//FALTARIAN CARACTERES EN OTROS IDIOMAS
// revisar mas caracteres  en https://www.taringa.net/posts/offtopic/3707799/Caracteres-especiales-con-ALT.html

//funcion para crear url´s amigables

function UrlAmigable($id,$titulo){// url amigable para los foros

  $titulo = $id . '-' . $titulo;

  // primero nos aseguramos de que los espacios se cambien por -

  $titulo = trim($titulo);//para evitar que si un titulo se llama  titulo  con espacios delante y detras y quede con url id--titulo-

  //hay que asegurarse de que se remplazan los caracteres especiales, como Ñ Ä etc



//A
  $titulo = str_replace(
      array('à', 'á', 'ä','â','ã','å','æ','ª','α','∀','@','∧','λ','Δ','À','Á','Â','Ã','Ä','Å','Ā','ā','Ă','ă','Ą','ą'),
      'a',
      $titulo

  );
//B
  $titulo = str_replace(
      array('ß','β'),
      'b',
      $titulo

  );
  //C

  $titulo = str_replace(
      array('¢','©','ç','ς','⊂','€','Ç','c','Ć','ć','Ĉ','ĉ','Ċ','ċ','Č','č'),
      'c',
      $titulo
  );
  //D
  $titulo = str_replace(
      array('₫','Ď','ď','Đ','đ'),
      'd',
      $titulo
  );

  //E
  $titulo = str_replace(
      array('è','é','ê','ë','ε','ξ','∈','∉','∋','∃','∑','È','É','Ê','Ë','Ē','ē','Ĕ','ĕ','Ė','ė','Ę','ę','Ě','ě'),
    'e',
      $titulo
  );
  //F
  $titulo = str_replace(
      array('ƒ'),
      'f',
      $titulo
  );


//G
$titulo = str_replace(
    array('Ĝ','ĝ','Ğ','ğ','Ġ','ġ','Ģ','ģ'),
    'g',
    $titulo
);


  //H
  $titulo = str_replace(
      array('H.','Ĥ','ĥ','Ħ','ħ'),
      'h',
      $titulo
  );


  //I
  $titulo = str_replace(
      array('ì','í','î','ï','¡','ℑ','Ì','Í','Î','Ï','Ĩ','ĩ','Ī','ī','Ĭ','ĭ','Į','į','İ','ı'),
      'i',
      $titulo
  );

//j
$titulo = str_replace(
    array('Ĵ','ĵ'),
    'j',
    $titulo
);
  //K
  $titulo = str_replace(
      array('κ','Ķ','ķ'),
      'k',
      $titulo
  );
  //L
  $titulo = str_replace(
      array('£','ζ','ι','¦','Ĺ','ĺ','Ļ','ļ','Ľ','ľ','Ŀ','ŀ','Ł','ł'),
      'l',
      $titulo
  );

  //n - Ñ
  $titulo = str_replace(
      array('ñ','η','π','ℵ','∩','Ñ'),
      'n',
      $titulo
  );
  //O
  $titulo = str_replace(
      array('ò','ó','ô','õ','ö','¤','ð','ø','δ','σ','φ','∅','Ò','Ó','Ô','Õ','Ö','Ω'),
      'o',
      $titulo
  );
  //P
  $titulo = str_replace(
      array('þ','ρ','℘','¶'),
      'p',
      $titulo
  );


  //R
  $titulo = str_replace(
      array('®','ℜ'),
      'r',
      $titulo
  );
  //S
  $titulo = str_replace(
      array('š','§','$'),
      's',
      $titulo
  );
  //T
  $titulo = str_replace(
      array('τ'),
      't',
      $titulo
  );
  //U
  $titulo = str_replace(
      array('ù','ú','û','ü','µ','υ','μ','∪','Ù','Ú','Û','Ü'),
      'u',
      $titulo
  );
  //V
  $titulo = str_replace(
      array('∨','√','ϑ'),
      'v',
      $titulo
  );

  //W
  $titulo = str_replace(
      array('ψ','ω','ϖ'),
      'w',
      $titulo
  );
  //X
  $titulo = str_replace(
      array('×','χ'),
      'x',
      $titulo
  );
  //Y
  $titulo = str_replace(
      array('¥','ý','ÿ','γ','ϒ','ÿ'),
      'y',
      $titulo
  );
  //Z
  $titulo = str_replace(
      array('ζ'),
      'z',
      $titulo
  );



  //2
  $titulo = str_replace(
      array('¨','«','¬','¯','±','´','·','¸','»','¿','÷','•','…','′','″','‾','⁄','−','∗','⋅','☺','☻','◘','○','►','◄','↕','‼','▬','↨','∟','▲','▼','⌂','░','▒','▓','│','┤','╣','║','╗','╝','┐','└','┬','├','┼','╚','╔','╩','╦','╠','═','╬','┘','┌','█','▄','▀','‗','°','•','•','■','☼'),
    '-',
      $titulo
  );

  //3
  $titulo = str_replace(
      array('∝','∞','∠','∫','∴','∼','≅','≈','≠','≡','≤','≥','⊃','⊄','⊆','⊇','⊕','⊗','⊥','◙','♂','♀','♪','♫',''),
    '-',
      $titulo
  );

  //4
  $titulo = str_replace(
      array('⌈','⌉','⌊','⌋','〈','〉','◊','♠','♣','♥','♦','"','&','<','>','ˆ','˜','—','\\','\"','~','‰'),
      '-',
      $titulo

  );
  //4
  $titulo = str_replace(
      array('œ','™','Æ','π'),
      array('oe','tm','ae','pi'),
      $titulo

  );
  //5
  $titulo = str_replace(
      array('‘','’','‚','“','”','„','†','‡','‰','‹','›','!','¡','#','(',')','{','}','[',']','⇓','⇔'),
      '-',
      $titulo
  );

  //6
  $titulo = str_replace(
      array('=','?','+','<','>',';','.',':','^','/','&','¬','∂','∇','∏','←','↑','→','↓','↔','↵','⇐','⇑','⇒'),
      '-',
      $titulo
  );
  //9
  $titulo = str_replace(
      array('²','³','°','¹','º','¼','½','¾','θ'),
      array('2','3','0','1','0','1-4','1-2','3-4','0'),
      $titulo
  );


  $titulo = str_replace(
      array(' ','—','-----','----','---','--','------','-------','--------','---------','----------','-----------'),
      '-',
      $titulo
  );

$titulo = strtolower($titulo);//todo en minusculas
return $titulo;
}
?>
