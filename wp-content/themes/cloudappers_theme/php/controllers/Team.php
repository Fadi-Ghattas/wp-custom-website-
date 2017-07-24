<?php

/**
 * Created by PhpStorm.
 * User: Fadi
 * Date: 05/08/17
 * Time: 5:42 PM
 */
class Team
{
    public static function view()
    {

    }

    public static function viewAll($data = [])
    {
        $fields = [
            'id',
            'post_title',
            [
                'acf' => 1,
                'name' => 'team_member_quote',
            ],
            [
                'acf' => 1,
                'name' => 'team_member_profile_image',
            ],
            [
                'acf' => 1,
                'name' => 'team_member_title',
            ],
            [
                'acf' => 1,
                'name' => 'team_member_position',
                'type' => 'position',
                'relationship' => 1,
                'fields' => [
                    'post_title',
                ],
            ],
        ];

        $filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => 't.menu_order, t.post_date, team_member_featured.meta_value DESC'];

        if (isset($data['page'])) {
            if ($data['page'] == 'home') {
//				$filters = ['limit' => intval($data['limit']), 'page' => 1, 'where' => 'team_member_featured.meta_value = 1', 'order_by' => 't.menu_order, t.post_date, team_member_featured.meta_value DESC'];
              $filters = ['limit' => -1, 'page' => 1, 'where' => '', 'order_by' => 't.menu_order, t.post_date, team_member_featured.meta_value DESC'];
            }
        }

        $team = TeamModel::search((new TeamModel())->pod_name, $fields, $filters);

//        if (isset($data['page'])) {
//            if ($data['page'] == 'home') {
//                //Admins
//                $admins = array_slice($team, 0, 5);
//                //3 Team members
//                $other = array_slice($team, 5);
//                $keys = array_keys($other);
//                shuffle($other);
//                foreach ($keys as $key) {
//                    $new[$key] = $other[$key];
//                }
//
//                $member = array_slice($new, 0, 3);
//
//                if (!empty($member))
//                    $team = array_merge($admins, $member);
//                else
//                    $team = $admins;
//            }
//        }
        return $team;
    }

}