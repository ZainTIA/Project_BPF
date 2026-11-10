<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
    ];


    public static function getValue(
        string $key,
        mixed $default = null
    ): mixed {
        $setting = static::where('key', $key)->first();


        if (!$setting) {
            return $default;
        }


        return match ($setting->type) {
            'boolean' => filter_var(
                $setting->value,
                FILTER_VALIDATE_BOOLEAN
            ),
            'integer' => (int) $setting->value,
            'float' => (float) $setting->value,
            'json' => json_decode($setting->value, true),
            default => $setting->value,
        };
    }


    public static function setValue(
        string $key,
        mixed $value,
        string $type = 'text'
    ): self {
        if ($type === 'json') {
            $value = json_encode($value);
        } elseif (is_bool($value)) {
            $value = $value ? '1' : '0';
        }


        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => (string) $value,
                'type' => $type,
            ]
        );
    }
}
