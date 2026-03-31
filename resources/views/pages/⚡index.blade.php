<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <livewire:article.highlight />
    <div class="flex flex-col">
        <livewire:article.flash class="lg:order-last" />
        <livewire:article.editor-pick />
    </div>
    <livewire:article.top-category category="Otomotif" />
    <livewire:article.top-category category="Pendidikan" />
    <livewire:article.top-category category="Teknologi" />
</div>