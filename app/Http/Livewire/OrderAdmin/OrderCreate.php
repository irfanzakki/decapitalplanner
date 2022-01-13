<?php

namespace App\Http\Livewire\OrderAdmin;

use Livewire\Component;
use App\Models\Order;
use App\Models\UserModel;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;


class OrderCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $city;
    public $zipcode;
    public $address;
    public $notes;
    public $catalog_id;
    public $category_id;
    public $categories = [];
    public $created_date;
    public $showSuccesNotification  = false;
    
    protected $rules = [
        'catalog_id' => 'required',
        'name' => 'required',
        'category_id' => '',
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'notes' => '',
        'city' => 'required',
        'zipcode' => 'required',
    ];

    // public function mount() { 
    //     $this->category = new Category();
    // }

    public function save() {
        
            $this->validate([
                'name' => 'required',
                'catalog_id' => 'required',
                'category_id' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'notes' => '',
                'city' => 'required',
                'zipcode' => 'required',
            ]);
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
            
            Order::create([
                'catalog_id' => $this->catalog_id,
                'order_id' => $orderid,
                'category_id' => $this->category_id,
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'user_id' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'notes' => $this->notes,
                'city' => $this->city,
                'zip_code' => $this->zipcode,
                'fix_price' => $category_item->price - ($category_item->discount * $category_item->price)/100,
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 1
            ]);
            
            $this->showSuccesNotification = true;

            session()->flash('message', 'Category successfully added.');
            $this->reset();
        
    }

    public function render()
    {   
        if(!empty($this->catalog_id)) {
            $this->categories = Category::where('catalog_id', $this->catalog_id)->get();
        }

        return view('livewire.orders.order-create',[
            'users' => UserModel::where('role','=','member')->get(),
        ]);
    }
}
