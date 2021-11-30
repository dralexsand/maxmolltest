<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var Generator
     */
    protected Generator $faker;

    /**
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return Generator
     * @throws BindingResolutionException
     */
    protected function withFaker(): Generator
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        $countCustomers = 127;
        $countOrderItems = 5731;

        $usersIdsArray = User::pluck('id')->toArray();
        $customers = $this->generateCustomers($countCustomers);

        $i = 1;

        while ($i <= $countOrderItems) {
            $dateCreated = $this->faker->dateTimeThisYear();

            DB::table('orders')->insert([
                'customer' => $customers[random_int(0, count($customers) - 1)],
                'phone' => $this->faker->phoneNumber(),
                'created_at' => $this->faker->dateTimeThisYear(),
                'completed_at' => $this->faker->dateTimeBetween($dateCreated),
                'user_id' => $this->faker->numberBetween(
                    $usersIdsArray[1],
                    $usersIdsArray[count($usersIdsArray) - 1]
                ),
                'type' => Order::getOrderTypes()[random_int(0, 1)],
                'status' => Order::getOrderStatuses()[random_int(0, 2)],
            ]);

            $i++;
        }
    }

    private function generateCustomers(int $max): array
    {
        $customers = [];
        $i = 1;
        while ($i < $max) {
            $customers[] = $this->faker->lastName() . ' ' . $this->faker->firstName();
            $i++;
        }

        return $customers;
    }
}
