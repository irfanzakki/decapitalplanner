<?php

namespace App\Http\Livewire\OrderAdmin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Order;
use App\Models\UserModel;
use Livewire\WithFileUploads;

use Illuminate\Support\Str;

class OrderEdit extends Component
{   
    use WithFileUploads;
    public $postId;
    public $name;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $city;
    public $zipcode;
    public $address;
    public $catalog_id;
    public $category_id;
    public $categories = [];

    public function mount($id){
        $edit = Order::find($id);
        // dd($edit);
        if ($edit) {
            $this->postId = $edit->id;
            $this->catalog_id = $edit->catalog_id;
            $this->category_id = $edit->category_id;
            $this->firstname = $edit->firstname;
            $this->lastname = $edit->lastname;
            $this->email = $edit->email;
            $this->name = $edit->user_id;
            $this->phone = $edit->phone;
            $this->address = $edit->address;
            $this->city = $edit->city;
            $this->zipcode = $edit->zip_code;
        }
    }

    public function update(){
        $edit = Order::find($this->postId);
        $random = strtoupper(Str::random(7));
            $generate = '0'.$this->name.date('ymd').$random;
                $orderid = '';
                if($this->catalog_id == 1){
                    $orderid = 'BRM'.$generate;
                }elseif($this->catalog_id == 2){
                    $orderid = 'BDP'.$generate;
                }else{
                    $orderid = 'BBS'.$generate;
                }
            $users = UserModel::where('id','=',$this->name)->first();
            $category_item = Category::where('catalog_id', $this->catalog_id)->first();
        if ($edit) {
            $edit->update([
                'catalog_id' => $this->catalog_id,
                'order_id' => $orderid,
                'category_id' => $this->category_id,
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'user_id' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'zip_code' => $this->zipcode,
                'fix_price' => $category_item->price - ($category_item->discount * $category_item->price)/100,
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            session()->flash('message', 'Category successfully updated.');
            return redirect()->route('billing');
        }
    }

    public function orderCancel($id){
        $edit = Order::find($id);
        
        if ($edit) {
            
            $edit->update([
                'remarks' => 'Data Has been Canceled by Admin',
                'status' => 3,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            session()->flash('message', 'Category successfully canceled.');
            return redirect()->route('billing');
        }
    }
    
    public function render()
    {   
        if(!empty($this->catalog_id)) {
            $this->categories = Category::where('catalog_id', $this->catalog_id)->get();
        }

        return view('livewire.orders.order-edit',[
            'users' => UserModel::where('role','=','member')->get(),
        ]);
    }
}
