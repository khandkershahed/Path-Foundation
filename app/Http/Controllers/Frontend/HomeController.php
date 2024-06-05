<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Site;
use App\Models\User;
use App\Models\Faq;
use App\Models\Rfq;
use App\Models\Row;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Policy;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Country;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Success;
use App\Models\Category;
use App\Models\Homepage;
use App\Models\Industry;
use App\Models\BrandPage;
use App\Models\LearnMore;
use App\Models\RfqProduct;
use App\Models\TechGlossy;
use App\Models\ClientStory;
use App\Models\DocumentPdf;
use App\Models\SubCategory;
use App\Models\IndustryPage;
use App\Models\SolutionCard;
use App\Models\WhatWeDoPage;
use Illuminate\Support\Facades\DB;
use App\Models\MultiIndustry;
use App\Models\PortfolioPage;
use App\Models\PortfolioTeam;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\OfficeLocation;
use App\Models\SolutionDetail;
use App\Models\SubSubCategory;
use App\Models\TechnologyData;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\PortfolioClient;
use App\Models\HardwareInfoPage;
use App\Models\NewsTrend;
use App\Models\PortfolioDetails;
use App\Models\SoftwareInfoPage;
use App\Models\PortfolioCategory;
use App\Models\PortfolioChooseUs;
use App\Models\SubSubSubCategory;
use App\Models\PortfolioClientFeedback;
use App\Models\CourseQuery;

class HomeController extends Controller
{

    //Client Authentication

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function register()
    {
        return view('frontend.auth.register');
    }



    //Homepage

    public function index()
    {

        $data['home'] = Homepage::latest('id')->with([
            'feature1', 'feature2', 'feature3', 'feature4', 'feature5',
            'success1', 'success2', 'success3',
            'story1', 'story2', 'story3', 'story4',
            'techglossy'
        ])->first();


        $data['features'] = [
            'feature1' => $data['home']->feature1 ?? null,
            'feature2' => $data['home']->feature2 ?? null,
            'feature3' => $data['home']->feature3 ?? null,
            'feature4' => $data['home']->feature4 ?? null,
            'feature5' => $data['home']->feature5 ?? null,
        ];
        $data['storys'] = [
            'story1' => $data['home']->story1 ?? null,
            'story2' => $data['home']->story2 ?? null,
            'story3' => $data['home']->story3 ?? null,
            'story4' => $data['home']->story4 ?? null,
        ];
        $data['successItems'] = [
            '1' => $data['home']->success1 ?? null,
            '2' => $data['home']->success2 ?? null,
            '3' => $data['home']->success3 ?? null,
        ];
        $data['techglossy'] = $data['home']->techglossy ?? null;



        return view('frontend.pages.home.index', $data);
    }










    //Learn More


    public function LearnMore()
    {
        $learnmore = LearnMore::with([
            'successStoryOne',
            'successStoryTwo',
            'successStoryThree',
        ])->orderBy('id', 'DESC')->first();

        if ($learnmore) {
            $data['learnmore'] = $learnmore;
            $data['story1'] = $learnmore->successStoryOne;
            $data['story2'] = $learnmore->successStoryTwo;
            $data['story3'] = $learnmore->successStoryThree;
        }

        return view('frontend.pages.learnmore.view', $data);
    }

    public function allCourses()
    {
        $courses = Course::latest()->get();
        return view('frontend.pagese.course.allCourses',compact('courses'));
    }

    public function courseDetails($id,$slug)
    {
        // $course = Course::find($id);
        return view('frontend.pagese.course.allCoursesDetails');
    }


    public function courseRegistration()
    {
        $data = [
            'courses' => Course::latest('id')->get(),
        ];
        return view('frontend.pagese.course.courseRegistration',$data);
    }

    //Course Registration Store
    public function courseRegistrationStore(Request $request)
    {
        CourseQuery::insert([

            'course_id' => $request->course_id,

            'name' => $request->name,
            'email' => $request->email,

            'phone' => $request->phone,
            
            'message' => $request->message,
            'address' => $request->address,
            'call' => $request->call,

            
            'ip_address' => $request->ip(),

            'created_at' => now(),

        ]);

        return redirect()->back()->with('success', 'Course Registerd Successfully!!');
    }

    //About
    public function about()
    {
        $data['about'] = AboutUs::latest('id', 'desc')->firstOrFail();
        if ($data['about']) {

            $data['row1'] = Row::where('id', $data['about']->row_one_id)->first();
            $data['row2'] = Row::where('id', $data['about']->row_two_id)->first();
            $data['row3'] = Row::where('id', $data['about']->row_three_id)->first();
        }
        // $data['pdfs'] = DocumentPdf::where('category', 'company')->latest('id', 'desc')->limit(4)->get(['document', 'button_name', 'button_link']);
        return view('frontend.pages.about.about', $data);
    }

    //What We Do

    public function whatWeDo()
    {
        $data['whatwedo'] = WhatWeDoPage::latest('id', 'desc')->firstOrFail();
        if (!empty($data['whatwedo'])) {
            $data['row_two'] = Row::where('id', $data['whatwedo']->row_two_id)->first();
            $data['row_three'] = Row::where('id', $data['whatwedo']->row_three_id)->first();
        }
        return view('frontend.pages.whatwedo.whatwedo', $data);
    }


    //Feature Details
    public function FeatureDetails($id)
    {
        $data['learnmore'] = LearnMore::orderBy('id', 'DESC')->select('learn_mores.industry_header', 'learn_mores.consult_title', 'learn_mores.consult_short_des', 'learn_mores.background_image')->first();
        $data['feature'] = Feature::with(['rowOne', 'rowTwo'])->findOrFail($id);

        $data['row_one'] = $data['feature']->rowOne;
        $data['row_two'] = $data['feature']->rowTwo;

        $data['features'] = Feature::with('rowOne', 'rowTwo')
            ->where('id', '!=', $id)->select('logo', 'id', 'badge', 'header')->get();
        return view('frontend.pages.feature.feature_details', $data);
    }


    //Contact, Support, Location, RFQ
    // public function location()
    // {
    //     $data['setting'] = Site::latest()->first();
    //     $data['locations'] = OfficeLocation::orderBy('name', 'ASC')->get();
    //     $country_ids = $data['locations']->pluck('country_id')->unique()->toArray();
    //     $data['countries']  = Country::whereIn('id', $country_ids)->get();
    //     $data['tech_datas'] = TechnologyData::where('category', 'location')->orderBy('id', 'desc')->limit(6)->get();
    //     return view('frontend.pages.contact.location', $data);
    // }

    public function contact()
    {
        $data['setting'] = Setting::latest()->first();
        return view('frontend.pages.contact.contact', $data);
    }

    public function Support()
    {
        $data['setting'] = Setting::latest()->first();
        return view('frontend.pages.contact.support', $data);
    }

    // Product Seach
    public function courseSearch(Request $request)
    {

        $request->validate(["search" => "required"]);

        $item = $request->search;
        //dd($request->search);
        // echo "$item";
        //$categories = Category::orderBy('title','ASC')->get();
        if (Course::where('name', $item)->where('product_status', 'product')->where('product_status', 'product')->first()) {
            $data['sproduct'] = Course::where('name', $item)->where('product_status', 'product')->where('product_status', 'product')->first();
            if (!empty($data['sproduct']->cat_id)) {
                $data['products'] = Course::where('cat_id', $data['sproduct']->cat_id)
                    ->where('product_status', 'product')
                    ->select('id', 'rfq', 'slug', 'name', 'thumbnail', 'price', 'discount', 'sku_code', 'mf_code', 'product_code', 'cat_id', 'brand_id')
                    ->limit(12)
                    ->distinct()
                    ->get();
            } else {
                $data['products'] = Course::inRandomOrder()->where('product_status', 'product')->limit(12)->get();
            }

            $data['brand'] = Brand::where('id', $data['sproduct']->brand_id)->select('id', 'slug', 'title', 'image')->first();
            $data['brandpage'] = BrandPage::where('brand_id', $data['brand']->id)->first(['id', 'banner_image', 'brand_logo', 'header']);
            $data['related_search'] = [
                'categories' =>  Category::where('id', '!=', $data['sproduct']->cat_id)->inRandomOrder()->limit(2)->get(),
                'brands' =>  Brand::where('id', '!=', $data['sproduct']->brand_id)->inRandomOrder()->where('status', 'active')->limit(20)->get(),
                'solutions' =>  SolutionDetail::inRandomOrder()->limit(4)->get('id', 'slug', 'name'),
                'industries' =>  Industry::inRandomOrder()->limit(4)->get('id', 'slug', 'title'),
            ];
            $data['brand_products'] = Course::where('brand_id', $data['sproduct']->brand_id)->where('id', '!=', $data['sproduct']->id)->inRandomOrder()->where('product_status', 'product')->limit(20)->get();

            $data['documents'] = DocumentPdf::where('product_id', $data['sproduct']->id)->get();

            return view('frontend.pages.kukapages.product_details', $data);
        } else {
            $data['categories'] = Category::orderBy('title', 'ASC')->get();
            $data['brands'] = Brand::orderBy('title', 'ASC')->where('status', 'active')->get();
            $data['newProduct'] = Course::orderBy('id', 'DESC')->where('product_status', 'product')->limit(3)->get();
            $data['products'] = Course::where('name', 'LIKE', '%' . $item . '%')->where('product_status', 'product')->paginate(10);
            return view('frontend.pages.product.shop_page', $data);
        }
    } // end method


    /// Advance Search Options
    public function globalSearch(Request $request)
    {
        $query = $request->get('term', '');
        $data['products'] = Course::join('brands', 'products.brand_id', '=', 'brands.id')
            ->where('products.name', 'LIKE', '%' . $query . '%')
            ->where('products.product_status', 'product')
            ->where('brands.status', 'active')
            ->limit(10)
            ->get(['products.id', 'products.name', 'products.slug', 'products.thumbnail', 'products.price', 'products.discount', 'products.rfq', 'products.qty', 'products.stock']);

        $data['solutions'] = SolutionDetail::where('name', 'LIKE', '%' . $query . '%')->limit(5)->get(['id', 'name']);
        $data['industries'] = Industry::where('title', 'LIKE', '%' . $query . '%')->limit(5)->get(['id', 'title']);
        $data['blogs'] = Blog::where('title', 'LIKE', '%' . $query . '%')->limit(5)->get(['id', 'title']);
        $data['categorys'] = Category::where('title', 'LIKE', '%' . $query . '%')->limit(2)->get(['id', 'title', 'slug']);
        $data['subcategorys'] = SubCategory::where('title', 'LIKE', '%' . $query . '%')->limit(2)->get(['id', 'title', 'slug']);
        $data['subsubcategorys'] = SubSubCategory::where('title', 'LIKE', '%' . $query . '%')->limit(1)->get(['id', 'title', 'slug']);
        $data['brands'] = Brand::where('title', 'LIKE', '%' . $query . '%')->where('status', 'active')->limit(5)->get(['id', 'title', 'slug']);
        $data['storys'] = ClientStory::where('title', 'LIKE', '%' . $query . '%')->limit(5)->get(['id', 'title']);
        $data['tech_glossys'] = TechGlossy::where('title', 'LIKE', '%' . $query . '%')->limit(5)->get(['id', 'title']);

        return response()->json(view('frontend.partials.search', $data)->render());
    } // end method

    public function TechGlossyDetails($id)
    {
        $data['techglossy'] = NewsTrend::where('id', $id)->firstOrFail();
        //$data['industry'] = Industry::where('id',$id)->first();
        //$data['industry_page'] = IndustryPage::where('industry_id', $data['industry']->id)->get();
        $data['storys'] = NewsTrend::inRandomOrder()->limit(7)->get();
        return view('frontend.pages.tech.techglossy_details', $data);
    }
    public function StoryDetails($id)
    {

        $data['blog'] = NewsTrend::where('id', $id)->firstOrFail();
        $data['storys'] = NewsTrend::inRandomOrder()->limit(4)->get();
        return view('frontend.pages.story.story_details', $data);
    }
}
