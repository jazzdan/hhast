<?hh // strict
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */


namespace Facebook\HHAST;

use function Facebook\FBExpect\expect;
use namespace HH\Lib\{C, Str, Vec};

final class PHPTest extends TestCase {
  public function testPHPOnlyFeature(): void {
    $code = <<<EOF
<?php
\$foo = new class {
  public function bar() {
    var_dump("Hello, world");
  }
};
\$foo->bar();
EOF;
    $ast = from_code($code);
    $anonymous_class = C\find(
      $ast->traverse(),
      $x ==> $x instanceof AnonymousClass,
    );
    expect($anonymous_class)->toNotBeNull();
  }

  public function testHackOnlyFeature(): void {
    $code = <<<EOF
<?hh
\$foo = \$a ==> var_dump(\$a);
\$foo(123);
EOF;
    $ast = from_code($code);
    $lambda = C\find(
      $ast->traverse(),
      $x ==> $x instanceof LambdaExpression,
    );
    expect($lambda)->toNotBeNull();
  }
}
