<div>
  <label for="{{ $name }}_all" class="mb-1 flex items-center">
    <input id="{{ $name }}_all" type="radio" name="{{ $name }}" value=""
      @checked(!request($name)) />
    <span class="ml-2">All</span>
  </label>

  @foreach ($optionsWithLabels as $label => $option)
    <label for="{{ $name }}_{{ $option }}" class="mb-1 flex items-center">
      <input id="{{ $name }}_{{ $option }}" type="radio" name="{{ $name }}" value="{{ $option }}"
        @checked($option === request($name)) />
        <span class="ml-2">{{ $label }}</span>
    </label>
  @endforeach
</div>