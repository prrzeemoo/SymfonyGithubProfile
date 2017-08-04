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
     * @Route("/{username}", name="githut", defaults={"username": "codereviewvideos"})
     */
    public function githutAction(Request $request, $username)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/' . $username);

        $data = json_decode($response->getBody()->getContents(), true);

        return $this->render('githut/index.html.twig', [
//            'username'   => $username,
            'avatar_url' => $data['avatar_url'],
            'name'       => $data['name'],
            'login'      => $data['login'],
            'details'    => [
                'company'   => $data['company'],
                'location'  => $data['location'],
                'joined_on' => 'Joined on ' . (new \DateTime($data['created_at']))->format('d m Y')
            ],
            'blog'        => $data['blog'],
            'social_data' => [
                'Public Repos' => $data['public_repos'],
                'Followers'    => $data['followers'],
                'Following'    => $data['following']
            ],
            'repo_count' => 100,
            'most_stars' => 67,
            'repos' => [
                [
                    'name'             => 'some repository',
                    'url'              => 'https://api.github.com/users/codereviewvideos',
                    'stargazers_count' => 46,
                    'description'      => 'learn symfony 1'
                ],
                [
                    'name'             => 'some kind of repository',
                    'url'              => 'https://api.github.com/users/codereviewvideoss',
                    'stargazers_count' => 47,
                    'description'      => 'learn symfony 2'
                ],
                [
                    'name'             => 'some repositories',
                    'url'              => 'https://api.github.com/users/codereviewvideossss',
                    'stargazers_count' => 48,
                    'description'      => 'learn symfony 3'
                ]
            ]
        ]);
    }

    /**
     * @Route("/profile/{username}", name="profile")
     */
    public function profileAction(Request $request, $username)
    {
        $profileData = $this->get('github_api')->getProfile($username);

        return $this->render('githut/profile.html.twig', $profileData);
    }
}