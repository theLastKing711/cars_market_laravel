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
id: number;
manufacturer_id: number | null;
manufacturer_name: string | null;
model: string | null;
year_manufactured: number | null;
car_price: number | null;
car_import_type: App.Enum.ImportType | null;
miles_travelled_in_km: number | null;
is_new_car: boolean | null;
fuel_type: App.Enum.FuelType | null;
car_sell_location: App.Enum.SyrianCity | null;
is_kassah: boolean | null;
is_khalyeh: boolean | null;
faragha_jahzeh: boolean | null;
shippable_to: Array<App.Data.User.Car.ShippableToCityData>;
};
export type CarOfferDetailsRespnseData = {
id: number;
manufacturer_id: number | null;
manufacturer_name_en: string | null;
manufacturer_name_ar: string | null;
model: string | null;
year_manufactured: number | null;
car_price: number | null;
car_label_origin: number | null;
car_import_type: App.Enum.ImportType | null;
miles_travelled_in_km: number | null;
is_new_car: boolean | null;
fuel_type: App.Enum.FuelType | null;
car_sell_location: App.Enum.SyrianCity | null;
is_kassah: boolean | null;
is_khalyeh: boolean | null;
is_faragha_jahzeh: boolean | null;
shippable_to: Array<App.Data.User.Car.ShippableToCityData>;
};
export type CreateCarOfferRequestData = {
manufacturer_id: number | null;
manufacturer_name_ar: string | null;
manufacturere_name_en: string | null;
model: string | null;
is_new_car: boolean | null;
car_price: number | null;
fuel_type: App.Enum.FuelType | null;
transmission_type: App.Enum.TransmissionType | null;
miles_travelled_in_km: number | null;
is_faragha_jahzeh: boolean | null;
is_kassah: boolean | null;
is_khalyeh: boolean | null;
};
export type ManufacturerListResponseData = {
name_ar: string;
name_en: string;
logo: string;
};
export type SearchCarOfferPaginationResultData = {
data: Array<App.Data.User.Car.CarListData>;
current_page: number;
per_page: number;
total: number;
};
export type SearchCarOfferResponseData = {
paginated_cars_search_result: App.Data.User.Car.SearchCarOfferPaginationResultData;
user_city_cars: Array<any>;
};
export type ShippableToCityData = {
city: App.Enum.SyrianCity;
};
}
declare namespace App.Data.User.Car.QueryParameters {
export type SearchCarOfferQueryParameterData = {
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
shippable_to: Array<App.Enum.SyrianCity> | null;
};
}
declare namespace App.Enum {
export type Color = 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10 | 11 | 12 | 13;
export type Currency = 1 | 2;
export type FuelType = 1 | 2 | 3;
export type Gender = 1 | 2;
export type ImportType = 1 | 2 | 3 | 4 | 5 | 6;
export type Latest = 1;
export type SyrianCity = 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 | 10 | 11 | 12 | 13 | 14 | 15 | 61 | 16 | 64 | 17 | 19 | 20 | 21 | 22 | 23 | 24 | 25 | 26 | 27 | 28 | 29 | 30 | 31 | 32 | 33 | 34 | 35 | 36 | 37 | 38 | 39 | 40 | 41 | 42 | 43 | 44 | 45 | 46 | 47 | 48 | 49 | 50 | 51 | 52 | 53 | 54 | 55 | 56 | 57 | 58 | 59 | 60 | 62 | 63;
export type TransmissionType = 0 | 1;
}
declare namespace App.Enum.Auth {
export type RolesEnum = 'admin' | 'user' | 'driver' | 'store';
}
