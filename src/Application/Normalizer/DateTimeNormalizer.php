<?php

namespace App\Application\Normalizer;

use TSantos\Serializer\CacheableNormalizerInterface;
use TSantos\Serializer\Normalizer\NormalizerInterface;
use TSantos\Serializer\SerializationContext;

/**
 * Class DateTimeNormalizer
 *
 * @author Tales Santos <tales.augusto.santos@gmail.com>
 */
class DateTimeNormalizer implements NormalizerInterface, CacheableNormalizerInterface
{
    public function canBeCachedByType(): bool
    {
        return true;
    }

    public function normalize($data, SerializationContext $context)
    {
        return [
            "canonical" => $data->format('Y-m-d H:i:s'),
            "ptBr" => $data->format('d/m/Y H:i:s'),
        ];
    }

    public function supportsNormalization($data, SerializationContext $context): bool
    {
        return $data instanceof \DateTimeInterface;
    }
}
