<?php

namespace App\Http\Livewire\Admin;

use App\Models\ComplainCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServiceCategoryComponent extends Component
{
    use WithPagination;
    public function deleteServiceCategory($id)
    {
            $scategory=ComplainCategory::find($id);
            if($scategory->image)
            {
                unlink('assets/images/categories'.'/'.$scategory->image);
            }
            if($scategory->coverimage)
            {
                unlink('assets/images/services'.'/'.$scategory->coverimage);
            }
            $scategory->delete();
            session()->flash('message','Service Category has been deleted successfully!');
    }
    public function render()
    {
        $scategories = ComplainCategory::paginate(20);
        return view('livewire.admin.admin-service-category-component',['scategories'=>$scategories])->layout('layouts.base');
    }
}
