<?php
namespace app\modules\server\models;

use Yii;
use yii\base\NotSupportedException;

class Server extends \frontend\components\hiresource\ActiveRecord {
    /**
     * @return array the list of attributes for this record
     */
    public function attributes () {
        return [
            'id',
            'name',
            'seller',
            'client',
            'panel',
            'parent_tariff',
            'tariff',
            'tariff_note',
            'discounts',
            'request_state',
            'request_state_label',
            'state_label',
            'status_time',
            'sale_time',
            'autorenewal',
            'state',
            'expires',
            'block_reason_label',
            'ip',
            'ips',
            'os',
            'osimage',
            'rcp',
            'vnc',
            'statuses',
            'running_task'
        ];
    }

    public function rules () {
        return [
            [
                ['name'], 'required'
            ]
        ];
    }

    /**
     * @return bool
     */
    public function isOperable () {
        if ($this->running_task) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     * @throws NotSupportedException
     */
    public function checkOperable () {
        if (!$this->isOperable())
            throw new NotSupportedException('Server has a running task');

        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels () {
        return [
            'id'                    => Yii::t('app', 'ID'),
            'name'                  => Yii::t('app', 'Name'),
            'seller'                => Yii::t('app', 'Seller'),
            'client'                => Yii::t('app', 'Client'),
            'panel'                 => Yii::t('app', 'Panel'),
            'parent_tariff'         => Yii::t('app', 'Parent tariff'),
            'tariff'                => Yii::t('app', 'Tariff'),
            'tariff_note'           => Yii::t('app', 'Tariff note'),
            'discounts'             => Yii::t('app', 'Discounts'),
            'request_state'         => Yii::t('app', 'Request state'),
            'state_label'           => Yii::t('app', 'State'),
            'status_time'           => Yii::t('app', 'Last operation time'),
            'sale_time'             => Yii::t('app', 'Sale time'),
            'autorenewal'           => Yii::t('app', 'Autorenewal'),
            'state'                 => Yii::t('app', 'State'),
            'expires'               => Yii::t('app', 'Expires'),
            'block_reason_label'    => Yii::t('app', 'Block reason label'),
            'request_state_label'   => Yii::t('app', 'Request state label'),
        ];
    }
}