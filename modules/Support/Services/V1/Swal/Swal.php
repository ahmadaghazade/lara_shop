<?php

namespace Modules\Support\Services\V1\Swal;

use Livewire\Component;
use Modules\Base\Services\V1\BaseService\BaseService;

class Swal extends BaseService
{
    /**
     * Swal config
     *
     * @var array $config
     */
    protected array $config = [];

    /**
     * Livewire component
     *
     * @var Component
     */
    protected Component $livewire;

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function set(string $key, mixed $value): static
    {
        $this->config[$key] = $value;
        return $this;
    }

    /**
     * Set the livewire component
     *
     * @param Component $livewire
     *
     * @return $this
     */
    public function fromLivewire(Component $livewire): static
    {
        $this->livewire = $livewire;
        return $this;
    }

    /**
     * Set toast
     *
     * @return $this
     */
    public function toast(): static
    {
        return $this->set('toast', true)
            ->withoutConfirmButton()
            ->withTimerProgressBar()
            ->interactiveTimer()
            ->timer5s()
            ->positionTopEnd()
        ;
    }

    /**
     * Set position top start
     *
     * @return $this
     */
    public function positionTopStart(): static
    {
        return $this->set('position', 'top-start');
    }

    /**
     * Set position top
     *
     * @return $this
     */
    public function positionTop(): static
    {
        return $this->set('position', 'top');
    }

    /**
     * Set position top end
     *
     * @return $this
     */
    public function positionTopEnd(): static
    {
        return $this->set('position', 'top-end');
    }

    /**
     * Set position center start
     *
     * @return $this
     */
    public function positionCenterStart(): static
    {
        return $this->set('position', 'center-start');
    }

    /**
     * Set position center
     *
     * @return $this
     */
    public function positionCenter(): static
    {
        return $this->set('position', 'center');
    }

    /**
     * Set position center end
     *
     * @return $this
     */
    public function positionCenterEnd(): static
    {
        return $this->set('position', 'center-end');
    }

    /**
     * Set position bottom start
     *
     * @return $this
     */
    public function positionBottomStart(): static
    {
        return $this->set('position', 'bottom-start');
    }

    /**
     * Set position bottom
     *
     * @return $this
     */
    public function positionBottom(): static
    {
        return $this->set('position', 'bottom');
    }

    /**
     * Set position bottom end
     *
     * @return $this
     */
    public function positionBottomEnd(): static
    {
        return $this->set('position', 'bottom-end');
    }

    /**
     * Show confirm button
     *
     * @return $this
     */
    public function withConfirmButton(): static
    {
        return $this->set('showConfirmButton', true);
    }

    /**
     * Hide confirm button
     *
     * @return $this
     */
    public function withoutConfirmButton(): static
    {
        return $this->set('showConfirmButton', false);
    }

    /**
     * Set danger toast appearance
     *
     * @return $this
     */
    public function dangerToast(): static
    {
        return $this
            ->toast()
            ->backgroundColor('#F04438')
            ->foregroundColor('#ffffff')
        ;
    }

    /**
     * Set success toast appearance
     *
     * @return $this
     */
    public function successToast(): static
    {
        return $this
            ->toast()
            ->backgroundColor('#12B76A')
            ->foregroundColor('#ffffff')
        ;
    }

    /**
     * Set info toast appearance
     *
     * @return $this
     */
    public function infoToast(): static
    {
        return $this
            ->toast()
            ->backgroundColor('#53B1FD')
            ->foregroundColor('#ffffff')
        ;
    }

    /**
     * Set warning toast appearance
     *
     * @return $this
     */
    public function warningToast(): static
    {
        return $this
            ->toast()
            ->backgroundColor('#FDB022')
            ->foregroundColor('#ffffff')
        ;
    }

    /**
     * Set the background color
     *
     * @param string $color
     *
     * @return $this
     */
    public function backgroundColor(string $color): static
    {
        return $this->set('background', $color);
    }

    /**
     * Set the background color
     *
     * @param string $color
     *
     * @return $this
     */
    public function foregroundColor(string $color): static
    {
        return $this->set('color', $color);
    }

    /**
     * Set 3s timer
     *
     * @return $this
     */
    public function timer3s(): static
    {
        return $this->timer(3000);
    }

    /**
     * Set 5s timer
     *
     * @return $this
     */
    public function timer5s(): static
    {
        return $this->timer(5000);
    }

    /**
     * Set timer period
     *
     * @param int $period
     *
     * @return $this
     */
    public function timer(int $period): static
    {
        return $this->set('timer', $period);
    }

    /**
     * Set interactive timer
     *
     * @return $this
     */
    public function interactiveTimer(): static
    {
        $expression = '(toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }';
        return $this->didOpenExpression($expression);
    }

    /**
     * Set did open expression
     *
     * @param string $expression
     *
     * @return $this
     */
    public function didOpenExpression(string $expression): static
    {
        return $this->set('didOpen', $expression);
    }

    /**
     * Enable timer progress bar
     *
     * @return $this
     */
    public function withTimerProgressBar(): static
    {
        return $this->set('timerProgressBar', true);
    }

    /**
     * Disable timer progress bar
     *
     * @return $this
     */
    public function withoutTimerProgressBar(): static
    {
        return $this->set('timerProgressBar', false);
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return $this
     */
    public function title(string $title): static
    {
        return $this->set('title', $title);
    }

    /**
     * Set success icon
     *
     * @return $this
     */
    public function iconSuccess(): static
    {
        return $this->icon('success');
    }

    /**
     * Set danger icon
     *
     * @return $this
     */
    public function iconDanger(): static
    {
        return $this->icon('error');
    }

    /**
     * Set warning icon
     *
     * @return $this
     */
    public function iconWarning(): static
    {
        return $this->icon('warning');
    }

    /**
     * Set info icon
     *
     * @return $this
     */
    public function iconInfo(): static
    {
        return $this->icon('info');
    }

    /**
     * Set Icon
     *
     * @param string $icon
     *
     * @return $this
     */
    public function icon(string $icon): static
    {
        return $this->set('icon', $icon);
    }

    /**
     * Set Icon Color
     *
     * @param string $color
     *
     * @return $this
     */
    public function iconColor(string $color): static
    {
        return $this->set('iconColor', $color);
    }

    /**
     * Get the json-encoded configs
     *
     * @return string
     */
    public function render(): string
    {
        return json_encode($this->config);
    }

    /**
     * Fire from livewire component
     *
     * @return void
     */
    public function fire(): void
    {
        $this->livewire->js('Swal.fire(' . $this->render() . ')');
    }
}
