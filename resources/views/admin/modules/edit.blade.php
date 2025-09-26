@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row ledger-add-form">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>✏️ Edit {{ $module->name }}</h4>
                        </div>
                        <a href="{{ route('admin.modules.records.index', $module->id) }}" class="btn btn-primary">
                            ⬅ Back
                        </a>
                    </div>

                    <form action="{{ route('admin.modules.records.update', [$module->id, $record->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                @foreach($module->fields as $field)
                                    @php
                                        $fieldName = "fields[{$field->id}]";
                                        $columnName = \Illuminate\Support\Str::snake($field->label);
                                        $value = old("fields.{$field->id}", $record->$columnName ?? '');
                                        $fieldOptions = is_array($field->options) ? $field->options : (json_decode($field->options, true) ?? []);
                                        $required = $field->required ? 'required' : '';
                                        $placeholder = $field->placeholder ?? '';
                                        $default = $field->default_value ?? '';
                                        $finalValue = $value ?: $default;
                                    @endphp

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">{{ $field->label }}
                                            @if($field->required) <span class="text-danger">*</span> @endif
                                        </label>

                                        {{-- Text / Number / Date / Email / Password --}}
                                        @if(in_array($field->type, ['text', 'number', 'date', 'email', 'password']))
                                            <input type="{{ $field->type }}" 
                                                name="{{ $fieldName }}" 
                                                class="form-control @error("fields.{$field->id}") is-invalid @enderror"
                                                value="{{ $finalValue }}"
                                                placeholder="{{ $placeholder }}"
                                                {{ $required }}>

                                        {{-- File --}}
                                        @elseif($field->type === 'file')
                                            @if(!empty($value))
                                                @if(is_array($value))
                                                    @foreach($value as $file)
                                                        <div class="mb-2">
                                                            <a href="{{ asset('storage/'.$file) }}" target="_blank">View File</a>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="mb-2">
                                                        <a href="{{ asset('storage/'.$value) }}" target="_blank">View File</a>
                                                    </div>
                                                @endif
                                            @endif
                                            <input type="file" 
                                                name="{{ $fieldName }}" 
                                                class="form-control @error("fields.{$field->id}") is-invalid @enderror" 
                                                {{ $required }}>

                                        {{-- Radio --}}
                                        @elseif($field->type === 'radio')
                                            @foreach($fieldOptions as $option)
                                                <div class="form-check">
                                                    <input class="form-check-input" 
                                                        type="radio" 
                                                        name="{{ $fieldName }}" 
                                                        value="{{ $option }}" 
                                                        {{ $finalValue == $option ? 'checked' : '' }}
                                                        {{ $required }}>
                                                    <label class="form-check-label">{{ $option }}</label>
                                                </div>
                                            @endforeach

                                        {{-- Checkbox --}}
                                 @elseif($field->type === 'checkbox')
                                            @php
                                                // Ensure fieldOptions is an array
                                                $fieldOptions = is_array($field->options) ? $field->options : json_decode($field->options, true);

                                                // Ensure finalValue is an array (from DB or old input)
                                                $finalValue = is_array($finalValue) ? $finalValue : json_decode($finalValue, true);
                                            @endphp

                                            @foreach($fieldOptions as $option)
                                                @php
                                                    $optionTrimmed = trim($option);
                                                @endphp
                                                <div class="form-check">
                                                    <input 
                                                        class="form-check-input" 
                                                        type="checkbox" 
                                                        name="{{ $fieldName }}[]" 
                                                        value="{{ $optionTrimmed }}"
                                                        {{ in_array($optionTrimmed, array_map('trim', $finalValue ?? [])) ? 'checked' : '' }}
                                                        {{ $required }}
                                                    >
                                                    <label class="form-check-label">{{ $optionTrimmed }}</label>
                                                </div>
                                            @endforeach


                                        {{-- Dropdown --}}
                                        @elseif($field->type === 'dropdown')
                                            <select name="{{ $fieldName }}" 
                                                class="form-control @error("fields.{$field->id}") is-invalid @enderror"
                                                {{ $required }}>
                                                <option value="" {{ empty($finalValue) ? 'selected' : '' }}>
                                                    Select {{ $field->label }}
                                                </option>
                                              

                                                {{-- STATIC VALUES --}}
                                                @if($field->value_type == 'static')
                                                
                                                    @foreach($fieldOptions as $option)
                                                        <option value="{{ $option }}" {{ $finalValue == $option ? 'selected' : '' }}>
                                                            {{ $option }}
                                                        </option>
                                                    @endforeach

                                                {{-- DYNAMIC VALUES --}}
                                                @elseif($field->value_type === 'dynamic' && !empty($fieldOptions) && isset($fieldOptions[0]))
                                                    @php
                                                        $moduleId = (int) $fieldOptions[0];
                                                        $moduleResult = \DB::table('modules')->where('id', $moduleId)->first();
                                                        $tableName = $moduleResult ? strtolower($moduleResult->name) . 's' : '';
                                                        $moduleFields = [];
                                                        $records = [];
                                                        if ($moduleResult && $tableName) {
                                                            $moduleFieldsRaw = \DB::table('module_fields')->where('module_id', $moduleId)->get();
                                                            foreach ($moduleFieldsRaw as $fieldRow) {
                                                                $moduleFields[] = strtolower(str_replace(' ', '_', $fieldRow->label));
                                                            }
                                                            $records = \DB::table($tableName)->get();
                                                        }
                                                    @endphp

                                                    @foreach($records as $record)
                                                        @php
                                                            $displayText = implode(' | ', array_map(function($label) use ($record) {
                                                                $columnName = strtolower(str_replace(' ', '_', $label));
                                                                return $record->$columnName ?? '';
                                                            }, $moduleFields));
                                                        @endphp
                                                        <option value="{{ $record->id }}" {{ $finalValue == $record->id ? 'selected' : '' }}>
                                                            {{ $displayText }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        @endif

                                        @error("fields.{$field->id}") 
                                            <div class="invalid-feedback">{{ $message }}</div> 
                                        @enderror
                                    </div>
                                @endforeach
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Update {{ $module->name }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection