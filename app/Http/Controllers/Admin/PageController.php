<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Page\PageCollection;
use App\Models\Media;
use App\Models\Page;
use App\Models\PageItem;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request){
        if ($request->wantsJson()) {
            $datas = Page::orderBy('title','asc')
            ->with(['pageItems']);

            $request->merge(['recordsTotal' => $datas->count(), 'length' => $request->length]);
            $datas = $datas->limit($request->length)->offset($request->start)->get();

            return response()->json(new PageCollection($datas));

        }
        return view('admin.page.list');
    }

    public function create(){
        return view('admin.page.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required|max:255',       
            'slug'=>'required|max:255|unique:pages',       
            'status'=>'required',    
        ]);

        $page = new Page;
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->status_id = $request->status;
        $page->save();
        return response()->json([
            'class' => 'bg-success', 
            'error' => false, 
            'message' => 'Page Created.', 
            'call_back' => route('admin.page.edit', $page->id),
        ]);
    }


    public function edit($id){
        $page = Page::where('id', $id)->with(['pageItems'])->first();
        return view('admin.page.add-section', compact('page'));
    }

    

    public function sectionStore(Request $request, $id){
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
            'video_id' => 'nullable',
            'image' => 'nullable',
            'product_id' => 'nullable|exists:products,id',
            'margin_top' => 'nullable|integer',
            'margin_right' => 'nullable|integer',
            'margin_bottom' => 'nullable|integer',
            'margin_left' => 'nullable|integer',
            'padding_top' => 'nullable|integer',
            'padding_right' => 'nullable|integer',
            'padding_bottom' => 'nullable|integer',
            'padding_left' => 'nullable|integer',
        ]);

        $image = $request->has('image') ? Media::find($request->image)->first() : null;

        $styles = [
            'margin' => [
                'top' => $request->margin_top ?? null,
                'right' => $request->margin_right ?? null,
                'bottom' => $request->margin_bottom ?? null,
                'left' => $request->margin_left ?? null,
            ],
            'padding' => [
                'top' => $request->padding_top ?? null,
                'right' => $request->padding_right ?? null,
                'bottom' => $request->padding_bottom ?? null,
                'left' => $request->padding_left ?? null,
            ],
        ];


        $inputs = $request->input('kt_docs_repeater_advanced', []); // Ensure default empty array

        $content = match ($validatedData['type']) {
            'image-with-text' => [
                'title' => $validatedData['title'] ?? '',
                'description' => $validatedData['description'] ?? '',
                'image' => $image?->file,
                'image_position' => $request->image_position??'',
            ],
            'text-with-video' => [
                'title' => $validatedData['title'] ?? '',
                'description' => $validatedData['description'] ?? '',
                'video' => $validatedData['video_url'] ?? '',
            ],
            'youtube-video' => [
                'title' => $validatedData['title'] ?? '',
                'description' => $validatedData['description'] ?? '',
                'youtube_id' => $request->youtube_id ?? '',
                'thumbnail_image' => $image?->file ?? null, 
            ],
            'icon_with_text' => [
                'icon' => $validatedData['icon'] ?? '',
                'title' => $validatedData['title'] ?? '',
                'description' => $validatedData['description'] ?? '',
            ],
            'recent-job' => [
                'icon' => $validatedData['icon'] ?? '',
                'title' => $validatedData['title'] ?? '',
                'description' => $validatedData['description'] ?? '',
            ],
            'feature_product' => [
                'product_id' => $validatedData['product_id'] ?? '',
            ],
            'logo-slider' => array_map(fn($item) => [
                'logo' => isset($item['logo']) ? Media::where('id', $item['logo'])->value('file') ?? '' : '',
                'title' => $item['title'] ?? '',
                'link' => $item['link'] ?? '',
            ], $inputs),
            'how-it-work' => array_map(fn($item) => [
                'title' => $item['title'] ?? '',
                'description' => $item['description'] ?? '',
                'icon' => $item['icon'] ?? '',
            ], $inputs),
            default => null,
        };


        if (!$content) {
            return response()->json([
                'class' => 'bg-danger',
                'error' => true,
                'message' => 'Invalid section type.',
            ], 400);
        }

        PageItem::create([
            'page_id' => $id,
            'type' => $validatedData['type'],
            'content' => $content,
            'heading' => $request->heading,
            'subheading' => $request->subheading,
            'button_label' => $request->button_label,
            'button_link' => $request->button_link,
            'ordering' => 1,
            'styles' => json_encode($styles)?? null,
        ]);

        return response()->json([
            'class' => 'bg-success',
            'error' => false,
            'message' => 'Section added successfully.',
            'call_back' => route('admin.page.edit', $id),
        ]);
    }



    
    public function sectionUpdate(Request $request, $id){
        //return $request->all();
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
            'image' => 'nullable',
            'product_id' => 'nullable|exists:products,id',
            'margin_top' => 'nullable|integer',
            'margin_right' => 'nullable|integer',
            'margin_bottom' => 'nullable|integer',
            'margin_left' => 'nullable|integer',
            'padding_top' => 'nullable|integer',
            'padding_right' => 'nullable|integer',
            'padding_bottom' => 'nullable|integer',
            'padding_left' => 'nullable|integer',
        ]);

        $pageItem = PageItem::find($id);

        if (!$pageItem) {
            return response()->json([
                'class' => 'bg-danger',
                'error' => true,
                'message' => 'Page section not found.',
            ], 404);
        }

        $image = $request->has('image') ? Media::where('id', $request->image)->first() : null;

        $inputs = $request->input('kt_docs_repeater_advanced', []); // Ensure default empty array

        $styles = [
            'margin' => [
                'top' => $request->margin_top ?? null,
                'right' => $request->margin_right ?? null,
                'bottom' => $request->margin_bottom ?? null,
                'left' => $request->margin_left ?? null,
            ],
            'padding' => [
                'top' => $request->padding_top ?? null,
                'right' => $request->padding_right ?? null,
                'bottom' => $request->padding_bottom ?? null,
                'left' => $request->padding_left ?? null,
            ],
        ];

        $content = match ($validatedData['type']) {
            'image-with-text' => [
                'title' => $validatedData['title'] ?? '',
                'description' => $validatedData['description'] ?? '',
                'image' => $image?->file,
                'image_position' => $request->image_position??'',
            ],
            'text-with-video' => [
                'title' => $validatedData['title'] ?? '',
                'description' => $validatedData['description'] ?? '',
                'video' => $validatedData['video_url'] ?? '',
            ],
            'youtube-video' => [
                'title' => $validatedData['title'] ?? '',
                'description' => $validatedData['description'] ?? '',
                'youtube_id' => $request->youtube_id ?? '',
                'thumbnail_image' => $image?->file ?? null, // set as null if not available 
            ],
            'icon_with_text' => [
                'icon' => $validatedData['icon'] ?? '',
                'title' => $validatedData['title'] ?? '',
                'description' => $validatedData['description'] ?? '',
            ],
            'feature_product' => [
                'product_id' => $validatedData['product_id'] ?? '',
            ],
            'logo-slider' => array_map(fn($item) => [
                'logo' => isset($item['logo']) ? Media::where('id', $item['logo'])->value('file') ?? '' : '',
                'title' => $item['title'] ?? '',
                'link' => $item['link'] ?? '',
            ], $inputs),
            'how-it-work' => array_map(fn($item) => [
                'title' => $item['title'] ?? '',
                'description' => $item['description'] ?? '',
                'icon' => $item['icon'] ?? '',
            ], $inputs),
            default => null,
        };

        if (!$content) {
            return response()->json([
                'class' => 'bg-danger',
                'error' => true,
                'message' => 'Invalid section type.',
            ], 400);
        }

        $pageItem->update([
            'type' => $validatedData['type'],
            'content' => $content,
            'heading' => $request->heading,
            'subheading' => $request->subheading,
            'button_label' => $request->button_label,
            'button_link' => $request->button_link,
            'ordering' => 1,
            'styles' => json_encode($styles)?? null,
        ]);

        return response()->json([
            'class' => 'bg-success',
            'error' => false,
            'message' => 'Section updated successfully.',
            'call_back' => route('admin.page.edit', $pageItem->page_id),
        ]);
    }


    public function destroySection(Request $request, $id)
    {
        $page_item = PageItem::find($id);
        if($page_item->delete()){
            return response()->json(['message'=>'Section deleted Successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }


}
