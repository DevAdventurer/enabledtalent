@php
    $styles = json_decode($section->styles, true);
    $styleAttributes = [];

    // Margin
    if (validStyle($styles['margin']['top'])) $styleAttributes[] = "margin-top: {$styles['margin']['top']}px;";
    if (validStyle($styles['margin']['right'])) $styleAttributes[] = "margin-right: {$styles['margin']['right']}px;";
    if (validStyle($styles['margin']['bottom'])) $styleAttributes[] = "margin-bottom: {$styles['margin']['bottom']}px;";
    if (validStyle($styles['margin']['left'])) $styleAttributes[] = "margin-left: {$styles['margin']['left']}px;";

    // Padding
    if (validStyle($styles['padding']['top'])) $styleAttributes[] = "padding-top: {$styles['padding']['top']}px;";
    if (validStyle($styles['padding']['right'])) $styleAttributes[] = "padding-right: {$styles['padding']['right']}px;";
    if (validStyle($styles['padding']['bottom'])) $styleAttributes[] = "padding-bottom: {$styles['padding']['bottom']}px;";
    if (validStyle($styles['padding']['left'])) $styleAttributes[] = "padding-left: {$styles['padding']['left']}px;";

    $styleString = !empty($styleAttributes) ? implode(' ', $styleAttributes) : '';
@endphp

@push('links')
<style>
    #section_{{$section->id}}{
        {!! $styleString !!}
    }
</style>
@endpush

<!-- process-area -->
        <div id="section_{{$section->id}}" class="process-area py-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <h2 class="site-title">{{ $section->heading }}</h2>
                            <span>{{ $section->subheading }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach($content as $index => $item)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="process-item">
                            <span class="process-count">{{ $loop->index+1 }}</span>
                            <div class="process-icon">
                                <i class="{{ $item['icon']??'' }}"></i>
                            </div>
                            <div class="process-content">
                                <h5>{{ $item['title']??'' }}</h5>
                                <p>{{ $item['description']??'' }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if(isset($section->button_link))
                        <div class="col-md-12 text-center">
                            <a class="btn btn-primary" href="{{ $section->button_link }}">{{ $section->button_label }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- process-area end -->