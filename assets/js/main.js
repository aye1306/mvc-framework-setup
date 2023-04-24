const Ajax_GET = async () => {
  let json_res = await $.ajax({
    type: "GET",
    url: "../controllers/example_controller?example_method=true",
    success: function (data) {
      console.log(data);
      return data;
    },
  });

  return json_res;
};

const Ajax_POST = async () => {
  let json_res = await $.ajax({
    type: "POST",
    url: "../controllers/example_controller",
    data: { example_method: true },
    success: function (data) {
      console.log(data);
      return data;
    },
  });
  return json_res;
};
