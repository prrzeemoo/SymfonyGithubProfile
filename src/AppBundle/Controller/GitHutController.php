<?php
/**
 * Created by PhpStorm.
 * User: Przemo
 * Date: 2017-08-03
 * Time: 18:19
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GitHutController extends Controller
{
    /**
     * @Route("/", name="githut")
     */
    public function githutAction(Request $request)
    {

        return $this->render('githut/index.html.twig', [
            'avatar_url' => 'https://avatars2.githubusercontent.com/u/12968163?v=4',
            'name' => 'Code Review Videos',
            'login' => 'codereviewvideos',
            'details' => [
                'company' => 'Code Review Videos',
                'location' => 'Preston, UK',
                'joined_on' => 'Joined 25th Jue 2017'
            ],
            'blog' => 'blog: https://codereviewvideos.com/',
            'social_data' => [
                'Public_repos' => '39',
                'Followers' => '51',
                'Following' => '1'
            ],
            'repo_count' => 100,
            'most_stars' => 67,
            'repos' => [
                [
                    'name' => 'some repository',
                    'url' => 'https://api.github.com/users/codereviewvideos',
                    'stargazers_count' => 46,
                    'description' => 'learn symfony 1'
                ],
                [
                    'name' => 'some kind of repository',
                    'url' => 'https://api.github.com/users/codereviewvideoss',
                    'stargazers_count' => 47,
                    'description' => 'learn symfony 2'
                ],
                [
                    'name' => 'some repositories',
                    'url' => 'https://api.github.com/users/codereviewvideossss',
                    'stargazers_count' => 48,
                    'description' => 'learn symfony 3'
                ]
            ]
        ]);
    }


//    /**
//     * @Route("/profile", name="profile")
//     */
//    public function profileAction(Request $request)
//    {
//
//        return $this->render('githut/profile.html.twig', [
//            'avatar_url' => 'https://avatars2.githubusercontent.com/u/12968163?v=4',
//            'name' => 'Code Review Videos',
//            'login' => 'codereviewvideos',
//            'details' => [
//                'company' => 'Code Review Videos',
//                'location' => 'Preston, UK',
//                'joined_on' => 'Joined 25th Jue 2017'
//            ],
//            'blog' => 'blog: https://codereviewvideos.com/',
//            'social_data' => [
//                'Public_repos' => '39',
//                'Followers' => '51',
//                'Following' => '1'
//            ]
//        ]);
//    }
}