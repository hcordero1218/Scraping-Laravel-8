<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class ScrapingController extends Controller
{
    public function scrape(Client $client)
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.spiegel.de/politik/');
        $inlineContactStyles = 'article_teaser>news-m-wide';
        $mydata = [];

        $crawler->filter("[data-area='$inlineContactStyles'], [data-area='article_teaser>opinion-m-wide']")->each(function (Crawler $contactNode) use (&$mydata) {


            $divs = $contactNode->children()->filter('div');
            $sectionImg = $divs->eq(1);
            $url = $sectionImg->filter("[class='block']")->first()->attr('href');
            $img = $sectionImg->filter("[class='absolute inset-0 rounded']")->first()->attr('src');

            $sectionExtrac = $divs->eq(3);
            $title = $sectionExtrac->filter("[class='hover:opacity-moderate focus:opacity-moderate'], [class='italic align-middle hover:opacity-moderate focus:opacity-moderate pr-px']")->first()->text('');
            $extrac = $sectionExtrac->filter("[class='font-serifUI font-normal text-base leading-loose mr-6'], [class='block font-serifUI text-base leading-loose sm:mr-16 mb-12']")->first()->text('');
            $date = $sectionExtrac->filter("[data-auxiliary='']")->first()->text('');
            $mydata[] = [
                'url'       => $url,
                'img'       => $img,
                'title'     => $title,
                'extrac'    => $extrac,
                'date'      => $date
            ];
            //var_dump($mydata);
            return $mydata;
        });
        //var_dump($mydata);
        return view('blog', compact('mydata'));
    }
}
