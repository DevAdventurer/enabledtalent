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


<div id="section_{{$section->id}}" class="about-area py-120 mb-30">
            <div class="container">
                <div class="row align-items-center">
                	@if($content['image_position'] == 'left')
	                    <div class="col-lg-6">
	                        <div class="about-left">
	                        	@if(isset($content['image']))
		                            <div class="about-img">
		                                <img src="{{ asset($content['image']) }}" alt="">
		                            </div>
	                            @endif
	                            <div class="about-shape">
	                                <img src="{{ asset('assets/img/shape/01.svg') }}" alt="">
	                            </div>
	                        </div>
	                    </div>
                    
	                    <div class="col-lg-6">
	                        <div class="about-right">
	                            <div class="site-heading mb-3">
	                                <h2 class="site-title">{{ $content['title'] }}</h2>
	                            </div>
	                            <p class="about-text">{{ $content['description'] }}</p>
	                            
	                            <a href="about.html" class="theme-btn" style="margin-top:20px;">Read More <i class="far fa-arrow-right"></i></a>
	                        </div>
	                    </div>

                    @endif

                   @if($content['image_position'] == 'right')
	                    
                    
	                    <div class="col-lg-6">
	                        <div class="about-right">
	                            <div class="site-heading mb-3">
	                                <h2 class="site-title">{{ $content['title'] }}</h2>
	                            </div>
	                            <p class="about-text">{{ $content['description'] }}</p>
	                            
	                            <a href="about.html" class="theme-btn" style="margin-top:20px;">Read More <i class="far fa-arrow-right"></i></a>
	                        </div>
	                    </div>

	                    <div class="col-lg-6">
	                        <div class="about-left">
	                        	@if(isset($content['image']))
		                            <div class="about-img">
		                                <img src="{{ asset($content['image']) }}" alt="">
		                            </div>
	                            @endif
	                            <div class="about-shape">
	                                <img src="{{ asset('assets/img/shape/01.svg') }}" alt="">
	                            </div>
	                        </div>
	                    </div>

                    @endif

                </div>
            </div>
        </div>

@push('scripts')

@endpush
