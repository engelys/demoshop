<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Wishlist\Form;

use Generated\Shared\Transfer\WishlistTransfer;
use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class WishlistFormType extends AbstractType
{
    public const FIELD_NAME = 'name';

    protected const GLOSSARY_KEY_NAME_VALIDATION_ERROR = 'wishlist.validation.error.name.wrong_format';
    protected const WISH_LIST_NAME_VALIDATION_REGEX = '/^[ A-Za-z0-9_-]+$/';

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => WishlistTransfer::class,
        ]);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addNameField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addNameField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_NAME, TextType::class, [
            'label' => 'Name',
            'required' => true,
            'constraints' => [
                new NotBlank(),
                new Regex(
                    [
                        'pattern' => static::WISH_LIST_NAME_VALIDATION_REGEX,
                        'message' => static::GLOSSARY_KEY_NAME_VALIDATION_ERROR,
                        'match' => true,
                    ]
                ),
            ],
        ]);

        return $this;
    }
}
