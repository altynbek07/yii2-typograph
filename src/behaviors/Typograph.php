<?php

namespace altynbek07\yii2Typograph;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use altynbek07\emtypograph\EMTypograph;

class Typograph extends Behavior
{
    /**
     * @var string|array
     */
    public $attributes = null;

    /**
     * Example:
     * [
     *  'Text.paragraphs' => 'off',
     *  'Text.breakline' => 'off'
     * ]
     *
     * @see altynbek07\emtypograph\EMTypograph
     * @var array
     */
    public $settings = null;

    /**
     * @var object
     */
    public $EMTypograph;

    public function init()
    {
        parent::init();

        $this->EMTypograph = new EMTypograph();
        $this->EMTypograph->setup($this->settings);
    }

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_VALIDATE => 'touch'
        ];
    }

    public function touch($event)
    {
        $this->attributes = (array)$this->attributes;

        if (!$this->attributes) {
            throw new \InvalidArgumentException('Attributes not set');
        }

        $this->typographAttributes();
    }

    /**
     * Примение типогрофа для заданных атрибутов
     */
    private function typographAttributes()
    {
        foreach ($this->attributes as $attribute) {
            $this->EMTypograph->set_text($this->owner->{$attribute});
            $this->owner->{$attribute} = $this->EMTypograph->apply();
        }
    }
}
