<?php

declare(strict_types=1);

namespace PhpProject\Fluent\Tests;

use PhpProject\Fluent\LinkWordsFluentTrait;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[Group('unit')]
#[Group('fluent')]
final class LinkWordsFluentTraitTest extends TestCase
{
    private ?Fluent $object;

    protected function setUp(): void
    {
        $this->object = null;
    }

    #[Test]
    public function link_words_only_return_the_using_object(): void
    {
        $_this = $this; // #ignoreLine
        $_this->given_a_link_word_fluent_object();
        $_return = $_this->when_chaining_all_methods();
        $_this->it_should_return_the_original_object($_return);
    }

    private function it_should_return_the_original_object(?Fluent $return): void
    {
        self::assertEquals($this->object, $return);
    }

    private function when_chaining_all_methods(): ?Fluent
    {
        return $this->object
            ?->all()->I()->want()->to()->do()->is()
            ->a()->that()->must()->make()->it()
            ->and()->then()->there()->’s()->an()
            ->the()->makes()->_()->its()->that()->should();
    }

    private function given_a_link_word_fluent_object(): void
    {
        $this->object = new Fluent();
    }
}

final class Fluent
{
    use LinkWordsFluentTrait;
}
