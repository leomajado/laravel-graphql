<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Models\Products as ProductModel;

class Products
{
    /**
     * Return a value for the field.
     *
     * @param  @param  null  $root Always null, since this field has no parent.
     * @param  array<string, mixed>  $args The field arguments passed by the client.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Shared between all fields.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Metadata for advanced query resolution.
     * @return mixed
     */
    public function resolve($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $p = new ProductModel;
        $p->name = $args['name'];
        $p->code = $args['code'];
        $p->description = $args['description'];
        $p->category_id = $args['category_id'];
        $p->save();

        return [
            'status' => 'SUCCESS',
            'id' => $p->id,
            'name' => $p->name,
            'code' => $p->code,
            'description' => $p->description,
            'category_id' => $p->category_id,
        ];
    }
}
