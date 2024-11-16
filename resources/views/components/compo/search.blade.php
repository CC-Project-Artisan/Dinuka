@props(['text', 'options', 'keyword', 'placeholder'])

<div class="ud-advert-page bg-white p-6 rounded shadow">
    <div class="ud-advert-status-wrapper flex-[25%]">
        <x-compo.label :for="'search-input'" :text="$text" class="mt-2 mb-2" />
        <!-- <p class="mt-2 mb-2"></i>Status</p> -->
        <x-compo.select :options="$options" />
    </div>
    <div class="ud-advert-keyword-wrapper flex-[50%]">
        <p class="mt-2 mb-2"></i>Keyword</p>
        <div class="flex">
            <x-compo.input :value="$keyword" type="text" :placeholder="$placeholder" class="ud-advert-keyword-input" />
            <a href="#"><i class="ud-advert-keyword-search fa-solid fa-magnifying-glass"></i></a>
        </div>
    </div>
</div>