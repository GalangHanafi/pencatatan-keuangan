<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'password',
        'photo',
        'is_superadmin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relation between user and account (user has many accounts)
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    // relation between user and category (user has many categories)
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // relation between user and transaction (user has many transactions)
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // create default category
    public function createDefaultCategories()
    {
        $expenses = [
            [
                'name' => 'Food',
                'icon' => 'ti ti-meat',
            ],
            [
                'name' => 'Transportation',
                'icon' => 'ti ti-bus',
            ],
            [
                'name' => 'Entertainment',
                'icon' => 'ti ti-movie',
            ],
            [
                'name' => 'Shopping',
                'icon' => 'ti ti-shopping-cart',
            ],
            [
                'name' => 'Health',
                'icon' => 'ti ti-heartbeat',
            ],
            [
                'name' => 'Bills',
                'icon' => 'ti ti-receipt',
            ],
            [
                'name' => 'Education',
                'icon' => 'ti ti-book',
            ],
            [
                'name' => 'Travel',
                'icon' => 'ti ti-plane',
            ],
            [
                'name' => 'Groceries',
                'icon' => 'ti ti-basket',
            ],
            [
                'name' => 'Insurance',
                'icon' => 'ti ti-shield',
            ],
            [
                'name' => 'Pets',
                'icon' => 'ti ti-paw',
            ],
            [
                'name' => 'other',
                'icon' => 'ti ti-box',
            ],
        ];

        $incomes = [
            [
                'name' => 'Salary',
                'icon' => 'ti ti-wallet',
            ],
            [
                'name' => 'Gifts',
                'icon' => 'ti ti-gift',
            ],
            [
                'name' => 'Investments',
                'icon' => 'ti ti-chart-line',
            ],
            [
                'name' => 'other',
                'icon' => 'ti ti-box',
            ]
        ];

        // Membuat kategori pengeluaran default
        foreach ($expenses as $expense) {
            $this->categories()->create(array_merge($expense, ['type' => 'expense', 'is_default' => true]));
        }

        // Membuat kategori pemasukan default
        foreach ($incomes as $income) {
            $this->categories()->create(array_merge($income, ['type' => 'income', 'is_default' => true]));
        }
    }

    // create default account "Cash"
    public function createDefaultAccount()
    {
        $this->accounts()->create([
            'name' => 'Cash',
            'icon' => 'ti ti-cash',
            'is_default' => true
        ]);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }
}
