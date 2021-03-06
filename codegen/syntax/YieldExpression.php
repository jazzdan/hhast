<?hh // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c507806198fb27973b3a12231e315fd9>>
 */
namespace Facebook\HHAST;
use namespace Facebook\TypeAssert;

<<__ConsistentConstruct>>
final class YieldExpression extends EditableNode {

  private EditableNode $_keyword;
  private EditableNode $_operand;

  public function __construct(EditableNode $keyword, EditableNode $operand) {
    parent::__construct('yield_expression');
    $this->_keyword = $keyword;
    $this->_operand = $operand;
  }

  <<__Override>>
  public static function fromJSON(
    dict<string, mixed> $json,
    string $file,
    int $offset,
    string $source,
  ): this {
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['yield_keyword'],
      $file,
      $offset,
      $source,
    );
    $offset += $keyword->getWidth();
    $operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['yield_operand'],
      $file,
      $offset,
      $source,
    );
    $offset += $operand->getWidth();
    return new static($keyword, $operand);
  }

  <<__Override>>
  public function getChildren(): dict<string, EditableNode> {
    return dict[
      'keyword' => $this->_keyword,
      'operand' => $this->_operand,
    ];
  }

  <<__Override>>
  public function rewriteDescendants(
    self::TRewriter $rewriter,
    ?vec<EditableNode> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $operand = $this->_operand->rewrite($rewriter, $parents);
    if ($keyword === $this->_keyword && $operand === $this->_operand) {
      return $this;
    }
    return new static($keyword, $operand);
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  public function withKeyword(EditableNode $value): this {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new static($value, $this->_operand);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns YieldToken
   */
  public function getKeyword(): YieldToken {
    return TypeAssert\instance_of(YieldToken::class, $this->_keyword);
  }

  public function getOperandUNTYPED(): EditableNode {
    return $this->_operand;
  }

  public function withOperand(EditableNode $value): this {
    if ($value === $this->_operand) {
      return $this;
    }
    return new static($this->_keyword, $value);
  }

  public function hasOperand(): bool {
    return !$this->_operand->isMissing();
  }

  /**
   * @returns LiteralExpression | MemberSelectionExpression |
   * PostfixUnaryExpression | VariableExpression | FunctionCallExpression |
   * ElementInitializer | BinaryExpression | PrefixUnaryExpression | BreakToken
   * | ParenthesizedExpression | NameToken | TupleExpression | LambdaExpression
   * | SubscriptExpression | Missing | ObjectCreationExpression |
   * AnonymousFunction
   */
  public function getOperand(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_operand);
  }
}
