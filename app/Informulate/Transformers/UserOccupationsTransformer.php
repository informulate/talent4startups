<?php

namespace Informulate\Transformers;

class UserOccupationsTransformer extends Transformer {

	/**
	 * @param $occupation
	 * @return array
	 */
	public function transform($occupation)
	{
		return [
			'name' => $occupation['name'],
			'slug' => $occupation['slug'],
			'created_at' => $occupation['created_at'],
			'updated_at' => $occupation['updated_at'],
			'interest' => (bool) $occupation['pivot']['interest']
		];
	}

}
