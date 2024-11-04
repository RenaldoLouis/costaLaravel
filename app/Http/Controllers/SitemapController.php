<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    public function index()
    {
        $routes = Route::getRoutes()->getRoutesByName();
        $sitemap = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');

        foreach ($routes as $name => $route) {

            // ignore URL /_ignition/health-check
            if ($route->uri === '_ignition/health-check') {
                continue;
            }

            // ignore jika route adalah POST
            if ($route->methods[0] === 'POST') {
                continue;
            }

            // Ignore routes that should not be in the sitemap or are part of the API
            if ($this->shouldIgnoreRoute($name, $route) || $route->getPrefix() === 'api' || str_contains($name, 'api.')) {
                continue;
            }

            $ignoredRoutes = ['orders', 'verify', 'affiliate.link.redirect', 'rajaongkir'];

            if (in_array($name, $ignoredRoutes)) {
                continue;
            }

            if (
                str_contains($name, 'orders') ||
                str_contains($name, 'sanctum') ||
                str_contains($name, 'rajaongkir.') ||
                str_contains($name, 'affiliate.') ||
                // language
                str_contains($name, 'language')
            ) {
                continue;
            }

            // jika home, maka priority dan changefreq di set berbeda
            if ($name === 'home') {
                $url = $sitemap->addChild('url');
                $url->addChild('loc', route($name));
                $url->addChild('lastmod', date('Y-m-d'));
                $url->addChild('changefreq', 'daily');
                $url->addChild('priority', '1.0');
                // Specific routes for products that include slug parameters
            } else if ($name === 'products.showBySlug') {
                $products = Product::all();  // Ensure you're only pulling necessary data, consider pagination for large datasets
                foreach ($products as $product) {
                    if (isset($product->slug)) {
                        $url = $sitemap->addChild('url');
                        $url->addChild('loc', route($name, ['slug' => $product->slug]));  // Ensure slug is provided
                        $url->addChild('lastmod', $product->updated_at->format('Y-m-d'));
                        $url->addChild('changefreq', 'weekly');
                        $url->addChild('priority', '0.8');
                    }
                }
                // else if blogs.showBySlug
            } else if ($name === 'blogs.showBySlug') {
                // Add blogs routes that include slug parameters
                $blogs = Blog::all();  // Ensure you're only pulling necessary data, consider pagination for large datasets
                foreach ($blogs as $blog) {
                    if (isset($blog->slug)) {
                        $url = $sitemap->addChild('url');
                        $url->addChild('loc', route($name, ['slug' => $blog->slug]));  // Ensure slug is provided
                        $url->addChild('lastmod', $blog->updated_at->format('Y-m-d'));
                        $url->addChild('changefreq', 'weekly');
                        $url->addChild('priority', '0.8');
                    }
                }
                // else if signup.type
            } else if ($name === 'signup.type') {
                // Add signup routes that include type parameters
                $types = ['reseller', 'affiliator'];  // Define all possible types
                foreach ($types as $type) {
                    $url = $sitemap->addChild('url');
                    $url->addChild('loc', route($name, ['type' => $type]));  // Ensure type is provided
                    $url->addChild('lastmod', date('Y-m-d'));
                    $url->addChild('changefreq', 'weekly');
                    $url->addChild('priority', '0.5');
                }
                // else if products.show
            } else if ($name === 'products.show') {
                // Add products routes that include id parameters
                $products = Product::all();  // Ensure you're only pulling necessary data, consider pagination for large datasets
                foreach ($products as $product) {
                    if (isset($product->id)) {
                        $url = $sitemap->addChild('url');
                        $url->addChild('loc', route($name, ['id' => $product->id]));  // Ensure id is provided
                        $url->addChild('lastmod', $product->updated_at->format('Y-m-d'));
                        $url->addChild('changefreq', 'weekly');
                        $url->addChild('priority', '0.8');
                    }
                }
                // else if products.showBySlug
            } else if ($name === 'products.showBySlug') {
                // Add products routes that include slug parameters
                $products = Product::all();  // Ensure you're only pulling necessary data, consider pagination for large datasets
                foreach ($products as $product) {
                    if (isset($product->slug)) {
                        $url = $sitemap->addChild('url');
                        $url->addChild('loc', route($name, ['slug' => $product->slug]));  // Ensure slug is provided
                        $url->addChild('lastmod', $product->updated_at->format('Y-m-d'));
                        $url->addChild('changefreq', 'weekly');
                        $url->addChild('priority', '0.8');
                    }
                }
                // else if products.showBySlug
            } else if ($name === 'products.showBySlug') {
                // Add products routes that include slug parameters
                $products = Product::all();  // Ensure you're only pulling necessary data, consider
                // categories, categories.showBySlug
            } else if ($name === 'categories.showBySlug') {
                // Add categories routes that include slug parameters
                $categories = Category::all();  // Ensure you're only pulling necessary data, consider pagination for large datasets
                foreach ($categories as $category) {
                    if (isset($category->slug)) {
                        $url = $sitemap->addChild('url');
                        $url->addChild('loc', route($name, ['slug' => $category->slug]));  // Ensure slug is provided
                        $url->addChild('lastmod', $category->updated_at->format('Y-m-d'));
                        $url->addChild('changefreq', 'weekly');
                        $url->addChild('priority', '0.8');
                    }
                }
                // else if signup.type
            } else {
                // Add general routes that do not require parameters
                if (!$route->hasParameters()) {
                    $url = $sitemap->addChild('url');
                    $url->addChild('loc', route($name));
                    $url->addChild('lastmod', date('Y-m-d'));
                    $url->addChild('changefreq', 'weekly');
                    $url->addChild('priority', '0.5');
                }
            }
        }

        $response = Response::make($sitemap->asXML(), 200);
        $response->header('Content-Type', 'application/xml');
        return $response;
    }

    private function shouldIgnoreRoute($name, $route)
    {
        // Exclude routes that are not intended for public access or are sensitive
        $excludes = ['login', 'logout', 'cart', 'account', 'admin', 'dashboard', 'authenticate', 'api'];
        foreach ($excludes as $exclude) {
            if (str_contains($name, $exclude) || in_array('auth', $route->middleware(), true)) {
                return true;
            }
        }
        return false;
    }
}
