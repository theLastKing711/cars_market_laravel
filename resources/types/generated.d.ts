declare namespace App.Data.Admin.Car {
export type CarResponseData = {
};
}
declare namespace App.Data.Shared {
export type ListData = {
id: number;
title: string;
};
}
declare namespace App.Data.Shared.File {
export type CreateFilePathData = {
url: string;
public_id: string;
};
export type FilePathData = {
url: string;
};
export type ShowFileData = {
uid: number;
url: string;
};
export type UpdateFileData = {
uid: number | null;
url: string;
};
export type UploadFileData = {
file: any;
};
export type UploadFileResponseData = {
url: string;
public_id: string;
};
}
declare namespace App.Data.User.Auth {
export type LoginRequestData = {
};
}
declare namespace App.Data.User.Car {
export type CarListData = {
manufacturer_id: number | null;
manufacturer_name: string | null;
model: string | null;
year_manufactured: number | null;
car_price: number | null;
car_import_type: App.Enum.ImportType | null;
miles_travelled_in_km: number | null;
};
export type CreateCarOfferRequestData = {
manufacturer_id: number;
user_id: number;
is_new_car: number;
year_manufactured: number | null;
car_color: App.Enum.Color | null;
model: number | null;
description: string | null;
car_price: number;
car_sell_currency: App.Enum.Currency;
fuel_type: App.Enum.FuelType | null;
car_sell_location: number | null;
is_car_shippable_to_a_different_city: boolean | null;
car_import_type: App.Enum.ImportType | null;
car_label_origin: number;
transmission: App.Enum.TransmissionType;
miles_travelled_in_km: number | null;
has_tuf_check_passed: boolean | null;
user_has_legal_car_papers: boolean | null;
faragha_jahzeh: boolean | null;
is_tajrobeh: boolean | null;
};
export type ManufacturerListResponseData = {
name_ar: string;
name_en: string;
logo: string;
};
export type SearchCarOfferResponseData = {
manufacturers: Array<any>;
user_city_cars: Array<any>;
};
}
declare namespace App.Data.User.Car.QueryParameters {
export type SearchOfferQueryParameterData = {
search: string | null;
user_current_syrian_city: App.Enum.SyrianCity | null;
manufacturer_id: number | null;
price_from: number | null;
price_to: number | null;
car_sell_location: number | null;
year_manufactured: number | null;
fuel_type: App.Enum.FuelType | null;
car_label_origin: number | null;
miles_travelled_in_km: number | null;
miles_travelled_in_km_from: number | null;
miles_travelled_in_km_to: number | null;
user_has_legal_car_papers: boolean | null;
faragha_jahzeh: boolean | null;
import_type: App.Enum.ImportType | null;
shippable_to: Array<any> | null;
};
}
declare namespace App.Enum {
export type Color = 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10 | 11 | 12 | 13;
export type Currency = 1 | 2;
export type FuelType = 1 | 2 | 3;
export type Gender = 1 | 2;
export type ImportType = 1 | 2 | 3 | 3 | 4 | 5;
export type Latest = 1;
export type SyrianCity = 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10 | 11 | 12 | 13 | 14 | 15 | 16 | 17 | 19 | 20 | 21 | 22 | 23 | 24 | 25 | 26 | 27 | 28 | 29 | 30 | 31 | 32 | 33 | 34 | 35 | 36 | 37 | 38 | 39 | 40 | 41 | 42 | 43 | 44 | 45 | 46 | 47 | 48 | 49 | 50 | 51 | 52 | 53 | 54 | 55 | 56 | 57 | 58 | 59 | 60 | 61 | 62 | 63 | 64;
export type TransmissionType = 0 | 1;
}
declare namespace App.Enum.Auth {
export type RolesEnum = 'admin' | 'user' | 'driver' | 'store';
}
