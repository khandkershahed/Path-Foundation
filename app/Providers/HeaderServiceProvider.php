<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Industry;
use App\Models\Site;
use App\Models\SolutionDetail;
use App\Models\TechGlossy;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('sites')) {

            View::share('setting', Site::first());

            $industrys = Industry::with('industryPage')
                ->inRandomOrder()
                ->limit(8)
                ->latest('id')
                ->get(['id', 'title', 'slug']);

            // Load features with eager loading and caching
            $features = Feature::take(2)
                ->inRandomOrder()
                ->get(['id', 'title', 'image', 'created_at', 'badge']);

            // $features = $featuresAndEvents->take(6);
            // $feature_events = $featuresAndEvents->skip(2)->take(6);

            // Load solution details with eager loading and caching
            $solutions = SolutionDetail::take(4)
                ->inRandomOrder()
                ->get(['id', 'name', 'slug']);

            // Load brand pages with eager loading and caching
            $brands = Brand::with('brandPage')->take(10)
                ->inRandomOrder()
                ->get(['id', 'slug', 'title']);

            $categorys = Category::take(5)
                ->inRandomOrder()
                ->get(['id', 'slug', 'title']);

            $blog = Blog::where('featured', '1')
                ->inRandomOrder()
                ->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by']);

            $techglossy = TechGlossy::where('featured', '1')
                ->inRandomOrder()
                ->first(['id', 'badge', 'title', 'image', 'created_at', 'created_by']);

            $cart_qty = Cart::count();

            // Load latest categories
            $categories = Category::with('subCategorys.subsubCategorys.subsubsubCategorys')
                ->orderBy('id', 'asc')
                ->limit(10)
                ->get(['id', 'slug', 'title']);

            View::share(compact(
                'industrys',
                'features',
                'solutions',
                'brands',
                'categorys',
                'blog',
                // 'clientstorys',
                'techglossy',
                'categories',
                'cart_qty'
            ));
        }
    }
}
