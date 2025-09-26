@extends('admin.layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row ledger-add-form">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>📄 View {{ $module->name }}</h4>
                        </div>
                        <a href="{{ route('admin.modules.records.index', $module->id) }}" class="btn btn-primary">
                            ⬅ Back
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($module->fields as $field)
                                @php
                                    $columnName = \Illuminate\Support\Str::snake($field->label);
                                    $value = $record->$columnName ?? ($field->default_value ?? '');
                                    $fieldOptions = is_array($field->options) ? $field->options : (json_decode($field->options, true) ?? []);
                                @endphp

                                <div class="col-md-4 mb-3">
                                    <label class="form-label"><strong>{{ $field->label }}:</strong></label>

                                    {{-- Text / Number / Date / Email / Password --}}
                                    @if(in_array($field->type, ['text', 'number', 'date', 'email', 'password']))
                                        <p>{{ $value }}</p>

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
                                        @else
                                            <p>-</p>
                                        @endif

                                    {{-- Radio --}}
                                    @elseif($field->type === 'radio')
                                        <p>{{ $value ?? '-' }}</p>

                                    {{-- Checkbox --}}
                                    @elseif($field->type === 'checkbox')
                                        @php
                                            $finalValue = is_array($value) ? $value : json_decode($value, true);
                                        @endphp
                                        @if(!empty($finalValue))
                                            <ul>
                                                @foreach($finalValue as $val)
                                                    <li>{{ $val }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p>-</p>
                                        @endif

                                    {{-- Dropdown --}}
                                    @elseif($field->type === 'dropdown')
                                        @if($field->value_type == 'static')
                                            <p>{{ $value ?? '-' }}</p>
                                        @elseif($field->value_type === 'dynamic' && !empty($fieldOptions) && isset($fieldOptions[0]))
                                            @php
                                                $moduleId = (int) $fieldOptions[0];
                                                $moduleResult = \DB::table('modules')->where('id', $moduleId)->first();
                                                $tableName = $moduleResult ? strtolower($moduleResult->name) . 's' : '';
                                                $displayText = '-';
                                                if ($moduleResult && $tableName && $value) {
                                                    $relatedRecord = \DB::table($tableName)->where('id', $value)->first();
                                                    if ($relatedRecord) {
                                                        $moduleFieldsRaw = \DB::table('module_fields')->where('module_id', $moduleId)->get();
                                                        $moduleFields = [];
                                                        foreach ($moduleFieldsRaw as $fieldRow) {
                                                            $moduleFields[] = strtolower(str_replace(' ', '_', $fieldRow->label));
                                                        }
                                                        $displayText = implode(' | ', array_map(fn($label) => $relatedRecord->$label ?? '', $moduleFields));
                                                    }
                                                }
                                            @endphp
                                            <p>{{ $displayText }}</p>
                                        @else
                                            <p>-</p>
                                        @endif
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection