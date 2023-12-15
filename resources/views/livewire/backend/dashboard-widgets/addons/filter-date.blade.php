<div class="card-header">
    <div class="flex justify-between items-center">
        <h4 class="card-title">
            {{ __($title) }}
        </h4>
        <div>
            <select wire:model.live="value" class="form-input form-select-sm" title="{{ __('filter by date') }}">
                @if (isset($date_filter_option_list) && count($date_filter_option_list))
                    @foreach ($date_filter_option_list as $date_index => $date)
                        <option value="{{ $date_index }}" wire:key="date_filter_key_{{ $date_index }}">
                            {{ __($date['label']) }}
                        </option>
                    @endforeach
                @endif

            </select>
        </div>
    </div>
</div>
