<?php

namespace Modules\Support\Services\V1\VariableBuilder;

use Filament\Support\Colors\Color;
use Illuminate\Support\HtmlString;
use Modules\Base\Services\V1\BaseService\BaseService;

class VariableBuilder extends BaseService
{
    /**
     * Props list
     *
     * @var array
     */
    protected array $props = [];

    /**
     * Parent tag
     *
     * @var string
     */
    protected string $parent_tag;

    /**
     * Open Builder
     *
     * @param string $tag
     * @param string $class
     *
     * @return $this
     */
    public function open(string $tag = 'p', string $class = ''): self
    {
        $this->parent_tag = $tag;
        $this->props[]    = "<$tag class='$class'>";
        return $this;
    }

    /**
     * Push a span
     *
     * @param string $string
     * @param string $class
     * @param bool   $selectable
     *
     * @return self
     */
    public function span(string $string, string $class = '', bool $selectable = false): self
    {
        $_             = $selectable ? '' : "style='user-select: none'";
        $this->props[] = "<span class='$class' $_>$string</span>";
        return $this;
    }

    /**
     * Push a span
     *
     * @param string $string
     * @param string $class
     * @param bool   $rtl
     *
     * @return self
     */
    public function copyable(string $string, string $class = '', bool $rtl = true): self
    {
        $dir           = $rtl ? 'dir="rtl"' : 'dir="ltr"';
        $alpine        = trim("
                x-on:click=\"window.navigator.clipboard.writeText('$string')
                \$tooltip('\u06a9\u067e\u06cc \u0634\u062f', { timeout: 2000 })\"
        ");
        $this->props[] = "<span class='$class' style='cursor: grab'
                $alpine
                $dir
                >$string</span>";
        return $this;
    }

    /**
     * Close and render
     *
     * @return HtmlString
     */
    public function close(): HtmlString
    {
        $this->props[] = '</' . $this->parent_tag . '>';
        return new HtmlString(implode(' ', $this->props));
    }
}
