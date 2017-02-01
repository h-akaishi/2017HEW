<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $sei_name
 * @property string $mei_name
 * @property string $sei_kana
 * @property string $mei_kana
 * @property string $user_sex
 * @property \Cake\I18n\Time $birth
 * @property string $mail_no
 * @property string $mail_add
 * @property string $user_tel
 * @property string $user_mail
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 * @property string $password
 * @property string $rule
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
